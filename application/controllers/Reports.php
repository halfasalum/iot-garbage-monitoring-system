<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "Base.php";

class Reports extends Base{

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('isLoggedIn')){
			$this->session->set_userdata('session_expire',true);
			redirect('Auth');
		}
		if ($this->session->userdata('lock')) {
			redirect('Auth/lock');
		}
	}

	public function index(){
        /*$this->page_data['page']			= 'reports/dashboard.php';*/
        $this->page_data['page']			= 'reports/reports.php';
        $this->renderPage($this->page_data);
    }

    public function under(){
        $this->load->view('reports/under');
    }

    public function zoneCollection($operation = 0){
        $start              = $this->input->post('start');
        $end                = $this->input->post('end');
        if (isset($_POST['run'])){
            $mode               = $this->input->post('mode');
            $zone               = $this->input->post('zone');
            if ($mode == 1){
                $this->page_data['data']    = self::generateZoneCollectionDetailed($zone,$start,$end);
            }elseif ($mode == 2){
                $this->page_data['data']    = self::generateZoneCollectionSummary($zone,$start,$end);
            }
        }
        if($operation == 1){

        }
        elseif (isset($_POST['download'])){
            $start              = $this->input->post('start');
            $end                = $this->input->post('end');
            redirect("Report/journal/$start/$end",array('target'=>'_blank'));
        }
        else{
            $start              = date('Y-m-01');
            $end                = date('Y-m-d');
        }
        $this->page_data['start']          = $start;
        $this->page_data['end']            = $end;
        $join                               = 'tbl_zone';
        $value                               = 'tbl_zone.zone_id = tbl_officer_zone.zone_id';
        $condition                          = array('officer_id'=>$this->session->userdata('user_id'),'officer_zone_status'=>1);
        $this->page_data['zones']           = $this->get('tbl_officer_zone',$condition,true,$join,$value);
        //$this->page_data['transaction']    	= $this->generateSalesSummary($start,$end);
        $this->page_data['page']			= 'reports/zoneCollections.php';
        $this->renderPage($this->page_data);
    }

    protected function generateZoneCollectionDetailed($zone, $start, $end){
        $table      = '';
        $join                               = 'tbl_zone';
        $value                               = 'tbl_zone.zone_id = tbl_officer_zone.zone_id';
        if ($zone == 0){
            $condition                          = array('officer_id'=>$this->session->userdata('user_id'),'officer_zone_status'=>1);
            $zones                          = $this->get('tbl_officer_zone',$condition,true,$join,$value);
            if (sizeof($zones) > 0){
                $table  .= '<table style="font-size: 11px;!important;" class="table table-bordered table-hover table-sm js-table-sections">';
                $table  .= '<thead>
                                    <tr>
                                        <th class="text-center">ZONE</th>
                                        <th class="text-center">TARGET</th>
                                        <th class="text-center">COLLECTED</th>
                                        <th class="text-center">BALANCE</th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                foreach ($zones as $zone){
                    $table          .='<tr>';
                    $table          .='<td colspan="4">'.$zone->zone_name.'</td>';
                    $table          .='</tr>';
                }
                $table          .='</tbody>';
                $table          .='</table>';
            }
        }else{
            $condition                          = array('officer_id'=>$this->session->userdata('user_id'),'officer_zone_status'=>1,'tbl_officer_zone.zone_id'=>$zone);
            $zones                          = $this->get('tbl_officer_zone',$condition,true,$join,$value);
            if (sizeof($zones) > 0){
                $table  .= '<table style="font-size: 11px;!important;" class="table table-bordered table-hover table-sm js-table-sections">';
                $table  .= '<thead>
                                    <tr>
                                        <th class="text-center"></th>
                                        <th class="text-center">DATE</th>
                                        <th class="text-center">TARGET</th>
                                        <th class="text-center">COLLECTED</th>
                                        <th class="text-center">BALANCE</th>
                                    </tr>
                                    </thead>
                                    <tbody>';
                foreach ($zones as $zone){
                    $table          .='<tr>';
                    $table          .='<td colspan="5">'.$zone->zone_name.'</td>';
                    $table          .='</tr>';
                    $join           = 'tbl_customers';
                    $value          = 'tbl_customers.customer_id = tbl_customer_loan_returns.return_customer';
                    $condition      = array('zone_id'=>$zone->zone_id,'return_date >='=>$start,'return_date <='=>$end,'is_collected'=>1,'supervisor_approve'=>3);
                    $customers      = $this->get('tbl_customer_loan_returns',$condition,true,$join,$value);
                    if (sizeof($customers) > 0){
                        foreach ($customers as $customer){
                            $table  .= '<tr>';
                            $table  .= '<td></td>';
                            $table  .= '<td>'.$customer->customer_fullname.'</td>';
                            $table  .= '</tr>';
                        }
                    }
                }
                $table          .='</tbody>';
                $table          .='</table>';
            }
        }
        return $table;
    }

    protected function generateZoneCollectionSummary($zone = 0, $start, $end){

    }

    public function inventory(){
	    $condition              = array('product_status !='=>4,'product_quantity > '=>0,'product_company'=>$this->session->userdata('company'));
        $join								= 'tbl_status';
        $value								= 'tbl_status.statusId = tbl_product.product_status';
        $join2								= 'tbl_brand';
        $value2								= 'tbl_brand.brand_id = tbl_product.product_brand';
        $join3								= 'tbl_category';
        $value3								= 'tbl_category.category_id = tbl_product.product_category';
        $join4								= 'tbl_unit';
        $value4								= 'tbl_unit.unit_id = tbl_product.product_unit';
        $this->page_data['products']		= $this->get('tbl_product',$condition,true,$join,$value,$join2,$value2,$join3,$value3,$join4,$value4);
        $this->load->view('reports/inventory_on_hand',$this->page_data);
    }

    public function lowStock(){
        $condition              = array('product_status !='=>4,'product_company'=>$this->session->userdata('company'));
        $join								= 'tbl_status';
        $value								= 'tbl_status.statusId = tbl_product.product_status';
        $join2								= 'tbl_brand';
        $value2								= 'tbl_brand.brand_id = tbl_product.product_brand';
        $join3								= 'tbl_category';
        $value3								= 'tbl_category.category_id = tbl_product.product_category';
        $join4								= 'tbl_unit';
        $value4								= 'tbl_unit.unit_id = tbl_product.product_unit';
        $this->page_data['products']		= $this->get('tbl_product',$condition,true,$join,$value,$join2,$value2,$join3,$value3,$join4,$value4);
        $this->load->view('reports/lowStock',$this->page_data);
    }

	public function saleSummary($id = null, $operation = null){
		if($operation == 1){
			$start              = $this->input->post('start');
			$end                = $this->input->post('end');
		}
		elseif (isset($_POST['download'])){
			$start              = $this->input->post('start');
			$end                = $this->input->post('end');
			redirect("Report/journal/$start/$end",array('target'=>'_blank'));
		}
		else{
			$start              = date('Y-m-01');
			$end                = date('Y-m-d');
		}
		$this->page_data['start']          = $start;
		$this->page_data['end']            = $end;
		$this->page_data['transaction']    	= $this->generateSalesSummary($start,$end);
		$this->load->view('reports/salesSummary',$this->page_data);
	}

	public function generateSalesSummary($start,$end){
	    $condition  = array('sale_date >='=>$start,'sale_date <='=>$end,'sale_company'=>$this->session->userdata('company'));
		$dates     = $this->get_distinct('tbl_sale','sale_date',$condition);

		/*$refNum = $this->BaseModel->getJournalRefNumList();
		$transactions = $this->BaseModel->getTransactionsList();*/
		$table = '';
		if (sizeof($dates) > 0){
		    $total              = 0;
		    $paid               = 0;
		    $balance            = 0;
            foreach ($dates as $date){
                $table .= '<tr><td colspan="6">'.date('D d M, Y',strtotime($date->sale_date)).'</td></tr>';
                $condition      = array('sale_date'=>$date->sale_date);
                $join           = 'tbl_customer';
                $value          = 'tbl_customer.customer_id = tbl_sale.sale_customer';
                $sales = $this->get('tbl_sale',$condition,true,$join,$value);
                foreach ($sales as $sale){
                    $total      += $sale->sale_total;
                    $paid       += $sale->sale_paid;
                    $balance    += $sale->sale_total- $sale->sale_paid;
                    $table      .= '<tr><td></td><td class="text-center">'.$sale->sale_number.'</td><td class="text-center">'.number_format($sale->sale_total,2).'</td><td class="text-center">'.number_format($sale->sale_paid,2).'</td><td class="text-center">'.number_format($sale->sale_total - $sale->sale_paid,2).'</td><td class="text-center">'.$sale->customer_name.'</td></tr>';
                }
            }
            $table          .= '<tr><td></td><td class="text-center"><strong>SUMMARY</strong></td><td class="text-center text-primary"><strong>'.number_format($total,2).'</strong></td><td class="text-center text-success"><strong>'.number_format($paid,2).'</strong></td><td class="text-center text-danger"><strong>'.number_format($balance,2).'</strong></td><td></td></tr>';
        }

		return $table;
	}

    public function salesPerCustomer($id = null, $operation = null){
        if($operation == 1){
            $start              = $this->input->post('start');
            $end                = $this->input->post('end');
            $customer           = $this->input->post('customer');
        }
        elseif (isset($_POST['download'])){
            $start              = $this->input->post('start');
            $end                = $this->input->post('end');
            $customer           = $this->input->post('customer');
            redirect("Report/journal/$start/$end",array('target'=>'_blank'));
        }
        else{
            $start              = date('Y-m-01');
            $end                = date('Y-m-d');
            $customer           = 0;
        }
        $this->page_data['start']          = $start;
        $this->page_data['end']            = $end;
        $condition							= array('customer_status'=>1,'customer_company'=>$this->session->userdata('company'));
        $this->page_data['customers']		= $this->get('tbl_customer',$condition,true);
        $this->page_data['lastCust']		= $customer;
        $this->page_data['transaction']    	= $this->generateSalesPerCustomer($start,$end,$customer);
        $this->load->view('reports/salesPerCustomer',$this->page_data);
    }

    public function generateSalesPerCustomer($start,$end,$customerId = 0){
        $table = '';
        $condition              = array('sale_company'=>$this->session->userdata('company'));
	    if ($customerId == 0){
	        $customers          = $this->get_distinct('tbl_sale','sale_customer',$condition);
        }else{
	        $condition          = array('sale_customer'=>$customerId,'sale_company'=>$this->session->userdata('company'));
	        $customers          = $this->get_distinct('tbl_sale','sale_customer',$condition);
        }

	    if (sizeof($customers) > 0){
	        foreach ($customers as $customer){
                $total              = 0;
                $paid               = 0;
                $balance            = 0;
	            $condition      = array('customer_id'=>$customer->sale_customer);
	            $customer_name  = $this->get('tbl_customer',$condition,null);
                $table .= '<tr><td colspan="6">'.$customer_name->customer_name.'</td></tr>';
	            $condition  = array('sale_date >='=>$start,'sale_date <='=>$end,'sale_customer'=>$customer->sale_customer);
                $sales = $this->get('tbl_sale',$condition,true);
                if (sizeof($sales) > 0){
                    foreach ($sales as $sale){
                            $total      += $sale->sale_total;
                            $paid       += $sale->sale_paid;
                            $balance    += $sale->sale_total- $sale->sale_paid;
                            $table      .= '<tr><td></td><td>'.date('D d M, Y',strtotime($sale->sale_date)).'</td><td class="text-center">'.$sale->sale_number.'</td><td class="text-center">'.number_format($sale->sale_total,2).'</td><td class="text-center">'.number_format($sale->sale_paid,2).'</td><td class="text-center">'.number_format($sale->sale_total - $sale->sale_paid,2).'</td></tr>';
                        }
                        $table          .= '<tr><td></td><td></td><td class="text-center"><strong>SUMMARY</strong></td><td class="text-center text-primary"><strong>'.number_format($total,2).'</strong></td><td class="text-center text-success"><strong>'.number_format($paid,2).'</strong></td><td class="text-center text-danger"><strong>'.number_format($balance,2).'</strong></td></tr>';
                }
            }
        }
        return $table;
    }

    public function salesPerProduct($id = null, $operation = null){
        if($operation == 1){
            $start              = $this->input->post('start');
            $end                = $this->input->post('end');
            $product           = $this->input->post('product');
        }
        elseif (isset($_POST['download'])){
            $start              = $this->input->post('start');
            $end                = $this->input->post('end');
            $product           = $this->input->post('product');
            redirect("Report/journal/$start/$end",array('target'=>'_blank'));
        }
        else{
            $start              = date('Y-m-01');
            $end                = date('Y-m-d');
            $product           = 0;
        }
        $condition                          = array('product_status !='=>4,'product_company'=>$this->session->userdata('company'));
        $this->page_data['products']        = $this->get('tbl_product',$condition,true);
        $this->page_data['start']          = $start;
        $this->page_data['lastPro']          = $product;
        $this->page_data['end']            = $end;
        $this->page_data['transaction']    	= $this->generateSalesPerProduct($start,$end,$product);
        $this->load->view('reports/salesPerProduct',$this->page_data);
    }

    public function generateSalesPerProduct($start,$end,$productId = 0){
        $table = '';
        $condition              = array('item_company'=>$this->session->userdata('company'));
        if ($productId == 0){
            $products          = $this->get_distinct('tbl_sale_items','sale_product',$condition);
        }else{
            $condition          = array('sale_product'=>$productId,'item_company'=>$this->session->userdata('company'));
            $products          = $this->get_distinct('tbl_sale_items','sale_product',$condition);
        }

        if (sizeof($products) > 0){
            foreach ($products as $product){
                $total              = 0;
                $qty               = 0;
                $price            = 0;
                $condition      = array('product_id'=>$product->sale_product);
                $product_name  = $this->get('tbl_product',$condition,null);
                $table .= '<tr><td colspan="6">'.$product_name->product_name.'</td></tr>';
                $join               = 'tbl_sale';
                $value              = 'tbl_sale.sale_number = tbl_sale_items.item_sale_number';
                $condition  = array('sale_date >='=>$start,'sale_date <='=>$end,'sale_product'=>$product->sale_product,'item_status'=>1);
                $sales = $this->get('tbl_sale_items',$condition,true,$join,$value);
                if (sizeof($sales) > 0){
                    foreach ($sales as $sale){
                        $total      += $sale->total;
                        $qty       += $sale->qty;
                        $price    += $sale->price;
                        $table      .= '<tr><td></td><td>'.date('D d M, Y',strtotime($sale->sale_date)).'</td><td class="text-center">'.$sale->sale_number.'</td><td class="text-center">'.number_format($sale->price,2).'</td><td class="text-center">'.$sale->qty.'</td><td class="text-center">'.number_format($sale->total,2).'</td></tr>';
                    }
                    $table          .= '<tr><td></td><td></td><td class="text-center"><strong>SUMMARY</strong></td><td class="text-center text-primary"></td><td class="text-center text-success"><strong>'.$qty.'</strong></td><td class="text-center text-success"><strong>'.number_format($total,2).'</strong></td></tr>';
                }
            }
        }
        return $table;
    }

    public function expenseDetail($id = null, $operation = null){
        if($operation == 1){
            $start              = $this->input->post('start');
            $end                = $this->input->post('end');
        }
        elseif (isset($_POST['download'])){
            $start              = $this->input->post('start');
            $end                = $this->input->post('end');
            redirect("Report/journal/$start/$end",array('target'=>'_blank'));
        }
        else{
            $start              = date('Y-m-01');
            $end                = date('Y-m-d');
        }
        $this->page_data['start']          = $start;
        $this->page_data['end']            = $end;
        $this->page_data['transaction']    	= $this->generateExpenseDetail($start,$end);
        $this->load->view('reports/expenseDetails',$this->page_data);
    }

    public function generateExpenseDetail($start,$end){
        $condition  = array('expense_date >='=>$start,'expense_date <='=>$end,'expense_company'=>$this->session->userdata('company'));
        $dates      = $this->get_distinct('tbl_expense','expense_date',$condition);

        /*$refNum = $this->BaseModel->getJournalRefNumList();
        $transactions = $this->BaseModel->getTransactionsList();*/
        $table = '';
        if (sizeof($dates) > 0){
            $total              = 0;
            foreach ($dates as $date){
                $table .= '<tr><td colspan="6">'.date('D d M, Y',strtotime($date->expense_date)).'</td></tr>';
                $condition      = array('expense_date'=>$date->expense_date);
                $join           = 'tbl_users';
                $value          = 'tbl_users.userId = tbl_expense.expense_user';
                $sales = $this->get('tbl_expense',$condition,true,$join,$value);
                foreach ($sales as $sale){
                    $total      += $sale->expense_amount;
                    $table      .= '<tr><td></td><td class="text-center">'.number_format($sale->expense_amount,2).'</td><td class="text-center">'.$sale->fullName.'</td></tr>';
                }
            }
            $table          .= '<tr><td class="text-center"><strong>SUMMARY</strong></td><td class="text-center text-primary"><strong>'.number_format($total,2).'</strong></td><td></td></tr>';
        }

        return $table;
    }


	public function ledger(){
		if(isset($_POST['run'])){
			$start              = $this->input->post('start');
			$end                = $this->input->post('end');
		}
		elseif (isset($_POST['download'])){
			$start              = $this->input->post('start');
			$end                = $this->input->post('end');
			redirect("Report/journal/$start/$end",array('target'=>'_blank'));
		}
		else{
			$start              = date('Y-m-01');
			$end                = date('Y-m-d');
		}
		$this->page_data['start']          = $start;
		$this->page_data['end']            = $end;
		$this->page_data['transaction']    	= $this->generateLedger($start,$end);
		$this->load->view('reports/ledger',$this->page_data);
	}

	public function generateLedger($start,$end){
		$accountSum     = 0;
		$accountTotal   = 0;
		$report         = 'Ledger';
		$accountList = $this->BaseModel->getAccountListFromLedger($report,$start,$end);
		$table = '';
		foreach ($accountList as $column){
			$accountNum =  $column->accountNum;
			$accDetails = $this->BaseModel->getAccountDetails($accountNum);
			$table .= '<tr>'.
				'<td class="text-left" colspan="8"><strong>'.$accDetails->accountName.'</strong></td>'.
				'</tr>';
			$transactions = $this->BaseModel->getLedgerTransactions($accountNum,$start,$end);
			foreach ($transactions as $data){
				$class = '';
				if($data->transactionType == 7){ $class = 'bg-warning';}
				$table .= '<tr class="'.$class.'">'.
					'<td></td>'.
					'<td>'.$data->transactionDate.'</td>'.
					'<td>'.$data->transTypeName.'</td>'.
					'<td>'.$data->refNum.'</td>'.
					'<td>'.$data->fullName.'</td>'.
					'<td>'.trim(str_replace('%20',' ',$data->description)).'</td>'.
					'<td>'.$data->accountAffectedName.'</td>'.
					'<td class="text-right">'.number_format($data->transactionAmount,2).'</td>'.
					'</tr>';
				if($data->transactionType != 7){ $accountSum += $data->transactionAmount; }
			}
			$table .= '<tr>'.
				'<td><strong>Total for '.$accDetails->accountName.'</strong></td>'.
				'<td colspan="6"></td>'.
				'<td class="text-right" style="border-top: 1px solid black; border-bottom: 1px solid black"><strong>'.number_format($accountSum,2).'</strong></td>'.
				'</tr>';
			$accountSum = 0;
		}
		return $table;
	}

	public function trial(){
		if(isset($_POST['run'])){
			$start              = $this->input->post('start');
			$end                = $this->input->post('end');
		}
		elseif (isset($_POST['download'])){
			$start              = $this->input->post('start');
			$end                = $this->input->post('end');
			redirect("Report/journal/$start/$end",array('target'=>'_blank'));
		}
		else{
			$start              = date('Y-m-01');
			$end                = date('Y-m-d');
		}
		$this->page_data['start']          = $start;
		$this->page_data['end']            = $end;
		$this->page_data['transaction']    	= $this->generateTrial($start,$end);
		$this->load->view('reports/trial',$this->page_data);
	}

	public function generateTrial($start,$end){
		$report         = 'Trial Balance';
		$accountList = $this->BaseModel->getAccountListFromLedger($report,$start,$end);
		$table = ''; $sumDebit = 0; $sumCredit = 0;
		foreach ($accountList as $column) {
			$credit = ''; $debit = '';
			$accountNum = $column->accountNum;
			$accDetails = $this->BaseModel->getAccountTotalTransactionAmount($accountNum,$start,$end);
			if ($accDetails->isCreditable == TRUE){ $credit = $accDetails->totalAmount; if ($credit >= 0){ $sumCredit += $credit; $credit = number_format($credit,2);  } } else{ $debit = $accDetails->totalAmount; if ($debit >= 0){ $sumDebit += $debit; $debit = number_format($debit,2); } }
			$table .= '<tr>' .
				'<td><strong>' .$accDetails->accountName . '</strong></td><td class="text-right">'.$debit.'</td><td class="text-right">'.$credit.'</td>' .
				'</tr>';
		}
		$table .= '<tr>'.
			'<td><strong>TOTAL</strong></td><td class="text-right" style="border-top: 1px solid black"><strong>'.number_format($sumCredit,2).'</strong></td><td class="text-right" style="border-top: 1px solid black"><strong>'.number_format($sumDebit,2).'</strong></td>'.
			'</tr>';
		return $table;
	}

	public function profitLoss(){
		if(isset($_POST['journal'])){
			$start              = $this->input->post('start');
			$end                = $this->input->post('end');
		}
		elseif (isset($_POST['download'])){
			$start              = $this->input->post('start');
			$end                = $this->input->post('end');
			redirect("Report/journal/$start/$end",array('target'=>'_blank'));
		}
		else{
			$start              = date('Y-m-01');
			$end                = date('Y-m-d');
		}
		$this->page_data['start']          = $start;
		$this->page_data['end']            = $end;
		$this->page_data['transaction']    	= $this->generateProfitLoss($start,$end);
		$this->load->view('reports/profitLoss',$this->page_data);
	}

	public function generateProfitLoss($start,$end){
		$report         = 'Profit & Loss';
		$incomeAccountList = $this->BaseModel->getIncomeAccounts();
		$table = '<tr><td colspan="2" class="text-left"><span><i class="fa fa-arrow-down"></i> </span> Income</td></tr>'; $sumDebit = 0; $sumCredit = 0;
		$sumIncomeAmount          = 0;
		foreach ($incomeAccountList as $column) {
			$incomeAccountNumber            = $column->accountNumber;
			$accountTransactionTotal        = $this->BaseModel->getAccountTotalTransactionAmount($incomeAccountNumber,$start,$end);
			$sumIncomeAmount                      += $accountTransactionTotal->totalAmount;
			$table .= '<tr>' .
				'<td class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$column->accountName . '</td><td class="text-right">'.number_format($accountTransactionTotal->totalAmount,2).'</td>' .
				'</tr>';
		}
		$table .= '<tr>'.
			'<td class="text-left"><strong>Total Income</strong></td><td class="text-right" style="/*border-top: 1px solid black*/"><strong>'.number_format($sumIncomeAmount,2).'</strong></td>'.
			'</tr>';
		$table .= '<tr>'.
			'<td class="text-left">GROSS PROFIT</td><td class="text-right" style="/*border-top: 1px solid black*/"><strong>'.number_format($sumIncomeAmount,2).' TZS</strong></td>'.
			'</tr>';
		$table .= '<tr>'.
			'<tr><td colspan="2" class="text-left"><span><i class="fa fa-arrow-down"></i> </span> Expenses</td></tr>';
		$expenseAccountList = $this->BaseModel->getExpenseAccounts();
		$sumExpenseAmount          = 0;
		foreach ($expenseAccountList as $column) {
			$expenseAccountNumber            = $column->accountNumber;
			$accountTransactionTotal        = $this->BaseModel->getAccountTotalTransactionAmount($expenseAccountNumber,$start,$end);
			$accountTransactionTotal->totalAmount == NULL ? $accountTransactionTotal->totalAmount = number_format(0,2) : $accountTransactionTotal->totalAmount;
			$sumExpenseAmount                      += $accountTransactionTotal->totalAmount;
			$table .= '<tr>' .
				'<td class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$column->accountName . '</td><td class="text-right">'.$accountTransactionTotal->totalAmount.'</td>' .
				'</tr>';
		}
		$table .= '<tr>'.
			'<td class="text-left"><strong>Total Expenses</strong></td><td class="text-right" style="/*border-top: 1px solid black*/"><strong>'.number_format($sumExpenseAmount,2).'</strong></td>'.
			'</tr>';
		$table .= '<tr>'.
			'<td class="text-left"><strong>NET OPERATING INCOME</strong></td><td class="text-right" style="/*border-top: 1px solid black*/"><strong>'.number_format($sumIncomeAmount - $sumExpenseAmount,2).'</strong></td>'.
			'</tr>';
		$table .= '<tr>'.
			'<td class="text-left"><strong>NET INCOME</strong></td><td class="text-right" style="border-top: 1px solid black; border-bottom: 1px solid black"><strong>'.number_format($sumIncomeAmount - $sumExpenseAmount,2).' TZS</strong></td>'.
			'</tr>';
		return $table;
	}

	public function profitLossDetails(){
		if(isset($_POST['save'])){
			$start              = $this->input->post('start');
			$end                = $this->input->post('end');
		}
		elseif (isset($_POST['download'])){
			$start              = $this->input->post('start');
			$end                = $this->input->post('end');
			redirect("Report/profitLossDetails/$start/$end");
		}
		else{
			$start              = date('Y-01-01');
			$end                = date('Y-12-31');
		}
		$data['start']          = $start;
		$data['end']            = $end;
		$data['transaction']    = $this->generateProfitLossDetails($start,$end);

		$this->load->view('reports/profitLossDetails', $data);
	}

	public function generateProfitLossDetails($start,$end){
		$report         = 'Profit & Loss';
		$incomeAccountList = $this->BaseModel->getIncomeAccounts();
		$table = '<tr><td colspan="7" class="text-left"><span><i class="mdi mdi-arrow-down-bold"></i> </span> Income</td></tr>'; $sumDebit = 0; $sumCredit = 0;
		$sumIncomeAmount          = 0;
		foreach ($incomeAccountList as $column) {
			$incomeAccountNumber            = $column->accountNumber;
			$accountTransactionTotal        = $this->BaseModel->getAccountTotalTransactionAmount($incomeAccountNumber,$start,$end);
			$table .= '<tr>' .
				'<td colspan="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-arrow-down-bold"></i>'.$column->accountName . '</td></tr>';
			$transactions                    = $this->BaseModel->getLedgerTransactions($incomeAccountNumber,$start,$end);
			foreach ($transactions as $transDetails){
				$table                      .= '<tr>';
				$table                      .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$transDetails->transactionDate.'</td><td>'.$transDetails->transTypeName.'</td><td>'.$transDetails->refNum.'</td><td>'.$transDetails->fullName.'</td><td>'.$transDetails->description.'</td><td>'.$transDetails->accountAffectedName.'</td><td class="text-right">'.number_format($transDetails->transactionAmount,2).'</td>';
				$table                      .= '</tr>';
			}

			$sumIncomeAmount                      += $accountTransactionTotal->totalAmount;
			$table .= '<tr>' .
				'<td colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total for '.$column->accountName . '</strong></td><td class="text-right" style="border-top: 2px dotted black; border-bottom: 2px dotted black;"><strong>'.number_format($accountTransactionTotal->totalAmount,2).'</strong></td>' .
				'</tr>';
		}
		$table .= '<tr>'.
			'<td colspan="6"><strong>Total Income</strong></td><td class="text-right" style="/*border-top: 1px solid black*/"><strong>'.number_format($sumIncomeAmount,2).'</strong></td>'.
			'</tr>';
		$table .= '<tr>'.
			'<td colspan="6">GROSS PROFIT</td><td class="text-right" style="/*border-top: 1px solid black*/"><strong>'.number_format($sumIncomeAmount,2).' TZS</strong></td>'.
			'</tr>';
		$table .= '<tr>'.
			'<tr><td colspan="7" class="text-left"><span><i class="mdi mdi-arrow-down-bold"></i> </span> Expenses</td></tr>';
		$expenseAccountList = $this->BaseModel->getExpenseAccounts();
		$sumExpenseAmount          = 0;
		foreach ($expenseAccountList as $column) {
			$expenseAccountNumber            = $column->accountNumber;
			$accountTransactionTotal        = $this->BaseModel->getAccountTotalTransactionAmount($expenseAccountNumber,$start,$end);
			$table .= '<tr>' .
				'<td colspan="7">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="mdi mdi-arrow-down-bold"></i>'.$column->accountName . '</td></tr>';
			$transactions                    = $this->BaseModel->getLedgerTransactions($expenseAccountNumber,$start,$end);
			foreach ($transactions as $transDetails){
				$table                      .= '<tr>';
				$table                      .= '<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$transDetails->transactionDate.'</td><td>'.$transDetails->transTypeName.'</td><td>'.$transDetails->refNum.'</td><td>'.$transDetails->fullName.'</td><td>'.$transDetails->description.'</td><td>'.$transDetails->accountAffectedName.'</td><td class="text-right">'.number_format($transDetails->transactionAmount,2).'</td>';
				$table                      .= '</tr>';
			}
			$accountTransactionTotal->totalAmount == NULL ? $accountTransactionTotal->totalAmount = number_format(0,2) : $accountTransactionTotal->totalAmount;
			$sumExpenseAmount                      += $accountTransactionTotal->totalAmount;
			$table .= '<tr>' .
				'<td colspan="6">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>Total for '.$column->accountName . '</strong></td><td class="text-right" style="border-top: 2px dotted black; border-bottom: 2px dotted black;"><strong>'.number_format($accountTransactionTotal->totalAmount,2).'</strong></td>' .
				'</tr>';
		}
		$table .= '<tr>'.
			'<td colspan="6"><strong>Total Expenses</strong></td><td class="text-right" style="/*border-top: 1px solid black*/"><strong>'.number_format($sumExpenseAmount,2).'</strong></td>'.
			'</tr>';
		$table .= '<tr>'.
			'<td colspan="6"><strong>NET OPERATING INCOME</strong></td><td class="text-right" style="/*border-top: 1px solid black*/"><strong>'.number_format($sumIncomeAmount - $sumExpenseAmount,2).'</strong></td>'.
			'</tr>';
		$table .= '<tr>'.
			'<td colspan="6"><strong>NET INCOME</strong></td><td class="text-right" style="border-top: 1px solid black; border-bottom: 1px solid black"><strong>'.number_format($sumIncomeAmount - $sumExpenseAmount,2).' TZS</strong></td>'.
			'</tr>';
		return $table;
	}



}
