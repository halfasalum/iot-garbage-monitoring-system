<?php
class BaseModel extends CI_Model
{

	function insert($table, $data)
	{
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	function update($table, $identifier, $value, $data)
	{
		if (!is_null($identifier))
			$this->db->where($identifier, $value);
		$this->db->update($table, $data);
	}

	public function get_distinct($table,$column,$condition = null,$join_1 = null, $value_1 = null, $join_2 = null, $value_2 = null){
		$this->db->select($column);
		$this->db->distinct();
        if (!is_null($join_1))
            $this->db->join($join_1, $value_1);
        if (!is_null($join_2))
            $this->db->join($join_2, $value_2);
		if (!is_null($condition))
			$this->db->where($condition);
        $this->db->order_by($column,'ASC');
		return $this->db->get($table)->result();
	}

	function get($table, $condition = null, $multiple = null, $join_1 = null, $value_1 = null, $join_2 = null, $value_2 = null, $join_3 = null, $value_3 = null, $join_4 = null, $value_4 = null, $join_5 = null, $value_5 = null)
	{
		if (!is_null($join_1))
			$this->db->join($join_1, $value_1);
		if (!is_null($join_2))
			$this->db->join($join_2, $value_2);
		if (!is_null($join_3))
			$this->db->join($join_3, $value_3);
		if (!is_null($join_4))
			$this->db->join($join_4, $value_4);
		if (!is_null($join_5))
			$this->db->join($join_5, $value_5);
		if (!is_null($condition))
			$this->db->where($condition);
		$fields = $this->db->field_data($table);
		foreach ($fields as $field)
		{
			if ($field->primary_key)
				$this->db->order_by($field->name,'DESC');
		}
		$result = $this->db->get($table);
		!is_null($multiple) ? $result = $result->result() : $result = $result->row();
		return $result;
	}

	function audit()
	{
		/*$role = $this->session->userdata('uerRole');
		$this->db->join('tbl_users', 'tbl_users.userId = tbl_users_logs.userId');
		//$this->db->where('userRole != ',1);
		$this->db->order_by('logId', 'DESC');
		return $this->db->get('tbl_users_logs')->result();*/
	}

	function updateV2($table, $condition, $data)
	{
		if (!is_null($condition)){
			$this->db->where($condition);
			$this->db->update($table, $data);
		}
	}

	public function productsSearch($product = null,$company = null){
		$this->db->like('product_name', $product);
		$this->db->where('product_status !=', 4);
		$this->db->where('product_company', $company);
		$this->db->where('product_quantity >', 0);
		return $this->db->get('tbl_product')->result();
	}

	/*
	 * Finance
	 */

	function getAccountTotalTransactionAmount($accountNum,$start,$end){
		$this->db->join('tbl_account','tbl_account.accountNumber = tbl_transaction_ledger.accountNum');
		$this->db->select_sum('transactionAmount','totalAmount');
		$this->db->select('isCreditable, accountName');
		$this->db->where('accountNum',$accountNum);
		$this->db->where('transactionDate >=',$start);
		$this->db->where('transactionDate <=',$end);
		$this->db->where('transactionType !=',7);
		return $this->db->get('tbl_transaction_ledger')->row();
	}

	function getTransactionsIdList($start,$end){
		//$query = 'select distinct least(transactionId,tbl_transaction.date) as transactionId from tbl_transaction_journal inner join tbl_transaction on tbl_transaction.transId = tbl_transaction_journal.transactionId where account != 1004 and tbl_transaction.date between'.$this->db->escape($start).' and '.$this->db->escape($end).'order by transactionId desc';
		$query = 'select distinct(transactionId) as transactionId from tbl_transaction_journal inner join tbl_transaction on tbl_transaction.transId = tbl_transaction_journal.transactionId where account != 1004 and tbl_transaction.date between'.$this->db->escape($start).' and '.$this->db->escape($end).'order by transactionId desc';
		return $this->db->query($query)->result();
	}

	function getJournalTransactions($transactionId){
		$this->db->join('tbl_transaction_transactiontype','tbl_transaction_transactiontype.transTypeId = tbl_transaction_journal.transTypeId');
		$this->db->join('tbl_users','tbl_users.userId = tbl_transaction_journal.name');
		$this->db->join('tbl_account','tbl_account.accountNumber = tbl_transaction_journal.account');
		$this->db->where('transactionId',$transactionId);
		$this->db->where('account !=',1004);
		$this->db->where('account !=',1006);
		$this->db->where('account !=',1005);
		$this->db->order_by('journalId', 'DESC');
		return $this->db->get('tbl_transaction_journal')->result();
	}

	function getTransactionTotal($transactionId){
		$this->db->select_sum('debit','debit');
		$this->db->select_sum('credit','credit');
		$this->db->where('transactionId',$transactionId);
		$this->db->where('account !=',1004);
		$this->db->where('account !=',1006);
		$this->db->where('account !=',1005);
		return $this->db->get('tbl_transaction_journal')->row();
	}

	function getAccountListFromLedger($report,$start,$end){
		if ($report == 'Ledger' || $report == 'Profit & Loss'){ $query = 'select distinct(accountNum) from tbl_transaction_ledger where  transactionDate between '.$this->db->escape($start).' and '.$this->db->escape($end).' order by transactionDate DESC '; }else{ $query = 'select distinct(accountNum) from tbl_transaction_ledger where accountNum != 1004 AND accountNum != 1006 AND accountNum != 1005 and transactionType != 7 and transactionDate between '.$this->db->escape($start).' and '.$this->db->escape($end).' order by transactionDate DESC '; }
		return $this->db->query($query)->result();
	}

	function getAccountDetails($accountNumber){
		$this->db->where('accountNumber',$accountNumber);
		return $this->db->get('tbl_account')->row();
	}

	function getLedgerTransactions($accountNum,$start,$end){
		$this->db->join('tbl_transaction_transactiontype','tbl_transaction_transactiontype.transTypeId = tbl_transaction_ledger.transactionType');
		$this->db->join('tbl_account','tbl_account.accountNumber = tbl_transaction_ledger.accountNum');
		$this->db->join('tbl_users','tbl_users.userId = tbl_transaction_ledger.payee');
		$this->db->where('accountNum',$accountNum);
		$this->db->where('transactionDate >=',$start);
		$this->db->where('transactionDate <=',$end);
		$this->db->order_by('transactionDate', 'DESC');
		return $this->db->get('tbl_transaction_ledger')->result();
	}

	function getIncomeAccounts(){
		$this->db->where('accTypeId',13);
		$this->db->where('isCreditable',TRUE);
		return $this->db->get('tbl_account')->result();
	}

	function getExpenseAccounts(){
		$this->db->where('accTypeId',16);
		return $this->db->get('tbl_account')->result();
	}

	function getReceivingAccountAsPaymentAccount(){
		$this->db->where('accountStatus',1);
		$this->db->where('accTypeId = 5 OR accTypeId = 4');
		return $this->db->get('tbl_account')->result();
	}

	function getInvoiceDetailsbyNum($invoiceNum,$method){
		$method != NULL ? $this->db->join('tbl_users','tbl_users.userId = tbl_invoice.customerId') : $method =  NULL;
		$this->db->where('invoiceNum',$invoiceNum);
		return $this->db->get('tbl_invoice')->row();
	}


}
