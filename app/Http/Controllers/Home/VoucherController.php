<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Fpdf;
use Illuminate\Support\Facades\Session;
use PDF;

class VoucherController extends Controller
{

  // public function __construct() {
    
  //   ob_end_clean();
  //   $this->sem = "SEM";
  //   $this->purpose = "voucher for..";
  //   $this->company = "ARCTIC ZONE THERMOSOLUTIONS INC.";
  //   $this->company_address = "Blk Lot 4, Consul St. South Fairview Park Q.C";
  //   $this->ay = "A.Y.";
  //   $this->student = "STUDENT NAME";
  //   $this->ref_number = "REFERENCE NUMBER";
  //   $this->application_date = "APPLICATION DATE";
  //   $this->branch = "BRANCH";
  //   $this->application_fee = 1000.00;
  //   $this->bank_fee = 20.00;
  //   $this->validity = "VALIDITY";
  //   $this->applicant_barcode = public_path('assets/images/barcode_applicant.png');
  //   $this->cashier_barcode = public_path('assets/images/barcode_cashier.png');
  //   $this->account_number = "ACCOUNT NUMBER";
  //   Fpdf::AddPage();
  //   Fpdf::SetMargins(5, 0, 0);
  //   Fpdf::SetFont('Courier','B',9);
  //   Fpdf::SetAutoPageBreak(true,1);

  // }

    public function index() 
    {
      if (Session::has('voucher')) {
        return view('home.voucher');
      }
      return redirect('service-request');
    }

    public function download_voucher() {
      if (!Session::has('voucher')) {
        return redirect('service-request');
      }
      $sr_id = Session::get('voucher')['service_request_id']; 
      $sr = ServiceRequest::with([
        'client', 'client_contact_person', 'payment_mode', 'appliances.service_fees'
      ])->where('id', $sr_id)->first()->toArray();
      $sr['total_amount'] = 0;
      foreach($sr['appliances'] as $appliance) {
          $found = array_filter($appliance['service_fees'], function($service_fee) use($appliance){
          return $service_fee['appliance_id'] === $appliance['id'] && 
          $service_fee['service_id'] === $appliance['pivot']['service_type_id'];
        });
        if (count($found) > 0) {
          $sr['total_amount'] += array_values($found)[0]['fee'];
        } 
      }
      $pdf = PDF::loadView('reports.voucher',  compact([
        'sr'
      ]));
      return $pdf->stream();
    }

    // private function _header(){
    //   Fpdf::SetFont('Courier','B',10);
    //   Fpdf::setXY(0,0);
    //   Fpdf::SetFillColor(400,400,400);
    //   Fpdf::Cell(0,40,"",0,0,'L',true);
    //   Fpdf::Image(public_path('assets/images/arctic-zone-logo.png'), 10, 13, 50, 19);
    //   Fpdf::SetXY(190,8);
    //   Fpdf::Cell(10,4,"",0,0,'R',false);
    //   Fpdf::SetFont('Courier','', 12);
    //   Fpdf::SetXY(38,15);
    //   Fpdf::Cell(60,6,"",100,1,'R',false);
    //   Fpdf::SetFont('Courier','B',12);
    //   Fpdf::SetXY(48,19);
    //   Fpdf::Cell(105,6,$this->company,100,1,'R',false);
    //   Fpdf::SetFont('Courier','B',11);
    //   Fpdf::SetXY(73,25);
    //   Fpdf::Cell(103,4,$this->company_address,100,0,'R',false);
    //   Fpdf::SetFont('Courier','B',24);
    //   Fpdf::SetXY(153,20);
    //   Fpdf::Cell(50,4,false);
    //   Fpdf::SetFont('Courier','B',11);
    //   Fpdf::SetXY(159,25);
    //   Fpdf::Cell(80,4,"",0,0,'L',false);
    //   Fpdf::SetXY(156,29);
    //   Fpdf::Cell(80,4,"",0,0,'L',false);
    // }

    // private function _footer(){
    //   Fpdf::SetFont('Courier','',9);
    //   Fpdf::SetY(280);
    //   Fpdf::Cell(0,4,"",0,1,'C',false);
    // }

    // private function _applicant(){
    //   /**
    //    * name, reference number
    //    */
    //   Fpdf::SetFont('Courier','B',19);
    //   Fpdf::setXY(10,45);
    //   Fpdf::Cell(50,4,strtoupper($this->student),0,1,'L',false);
    //   Fpdf::SetFont('Courier','B',13);
    //   Fpdf::setXY(10,50);
    //   Fpdf::Cell(50,4,$this->ref_number,0,1,'L',false);
    //   Fpdf::SetFont('Courier','B',25);
    //   Fpdf::SetTextColor(165,0,32);
    //   Fpdf::setXY(128,51);
     
    //   /**
    //    * pre-registration
    //    */
    //   Fpdf::SetFont('Courier','B',11);
    //   Fpdf::SetFillColor(400,400,400);
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::setXY(10,57);
    //   Fpdf::Cell(185,5,"",0,1,'L',true);
    //   Fpdf::SetFont('Courier','B',11);
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::setXY(12,62);
    //   Fpdf::Cell(115,4,"Reference Number:",0,1,'L',false);
    //   Fpdf::setXY(12,67);
    //   Fpdf::Cell(115,4,"Submitted Date and Time:",0,1,'L',false);
    //   Fpdf::setXY(12,72);
    //   Fpdf::Cell(115,4,"Mode of Payment:",0,1,'L',false);
    //   Fpdf::SetFont('Courier','B',12);
    //   Fpdf::setXY(75,62);
    //   Fpdf::Cell(100,4,$this->ref_number,0,1,'L',false);
    //   Fpdf::setXY(75,67);
    //   Fpdf::Cell(85,4,$this->application_date,0,1,'L',false);
    //   Fpdf::setXY(75,72);
    //   Fpdf::Cell(85,4,$this->branch,0,1,'L',false);

    //   /**
    //    * statement summary
    //    */
    //   Fpdf::SetFont('Courier','B',11);
    //   Fpdf::SetFillColor(230,230,230);
    //   Fpdf::SetTextColor(10,10,10);
    //   Fpdf::setXY(10,82);
    //   Fpdf::Cell(180,4,"PAYMENT SUMMARY",0,1,'L',true);
    //   Fpdf::SetFont('Courier','B',11);
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::setXY(12,92);
    //   Fpdf::Cell(140,4,"Unit Fee",0,1,'L',false);
    //   Fpdf::setXY(12,97);
    //   Fpdf::Cell(115,4,"Bank Service Fee",0,1,'L',false);
    //   Fpdf::SetFont('Courier','B',12);
    //   Fpdf::setXY(75,92);
    //   Fpdf::Cell(110,4,"PHP ".number_format($this->application_fee, 2),0,1,'R',false);
    //   Fpdf::setXY(75,97);
    //   Fpdf::Cell(110,4,number_format($this->bank_fee, 2),0,1,'R',false);

    //   /**
    //    * total
    //    */
    //   Fpdf::setXY(10,103,400);
    //   Fpdf::Cell(180,4,"","B",1,'R',false);
    //   Fpdf::SetFont('Courier','B',12);
    //   Fpdf::setXY(12,108);
    //   Fpdf::Cell(180,4,"TOTAL AMOUNT",0,1,'L',false);
    //   Fpdf::setXY(75,108);
    //   Fpdf::Cell(110,4,"PHP ".number_format(($this->application_fee + $this->bank_fee),2),0,1,'R',false);


    //   /**
    //    * notes
    //    */
    //   Fpdf::setXY(12,130);
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::MultiCell(150,4,'BANK SERVICE FEE IS APPLICABLE ONLY WHEN YOU PAY VIA LANDBANK',0,'L',false);
    //   /**
    //    * barcode, voucher validity
    //    */
    //   Fpdf::Image($this->applicant_barcode, 14, 150, 90, 12);
    //   Fpdf::Rect(10, 163, 100, 11, 'D');
    //   Fpdf::SetFont('Courier','B',11);
    //   Fpdf::setXY(12,167);
    //   Fpdf::Cell(20,4,"This Voucher is valid until: $this->validity",0,1,'L',false);
    //   Fpdf::Image(public_path('assets/images/cut_tracer.png'), 10, 178, 193);
    // }

    // private function _cashier(){

    //   /**
    //    * semi-header
    //    */
    //   Fpdf::SetFont('Courier','', 9);
    //   Fpdf::SetXY(12,190);
    //   Fpdf::Cell(80,4,"",0,1,'L',false);
    //   Fpdf::SetFont('Courier','B',12);
    //   Fpdf::SetXY(12,193);
    //   Fpdf::Cell(80,6,$this->company,0,1,'L',false);
    //   Fpdf::SetFont('Courier','B',11);
    //   Fpdf::SetXY(12,198);
    //   Fpdf::Cell(80,4,$this->company_address,0,0,'L',false);
    //   Fpdf::SetFont('Courier','B',19);
    //   Fpdf::setXY(12,207);
    //   Fpdf::Cell(50,4,strtoupper($this->student),0,1,'L',false);

    //   /**
    //    * application and bank service fee, barcode
    //    */
    //   Fpdf::SetFont('Courier','B',12);
    //   Fpdf::setXY(12,215);
    //   Fpdf::Cell(115,3,"Unit Fee",0,1,'L',false);
    //   Fpdf::setXY(12,220);
    //   Fpdf::Cell(115,3,"Bank Service Fee",0,1,'L',false);
    //   Fpdf::setXY(60,215);
    //   Fpdf::Cell(40,3,"PHP ".number_format($this->application_fee, 2),0,1,'R',false);
    //   Fpdf::setXY(60,220);
    //   Fpdf::Cell(40,3,number_format($this->bank_fee, 2),0,1,'R',false);
    //   Fpdf::SetFont('Courier','B',7);
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::setXY(12,225);
    //   Fpdf::Cell(90,3,"BANK SERVICE FEE IS APPLICABLE ONLY WHEN YOU PAY VIA LANDBANK",0,1,'L',false);
    //   Fpdf::Image($this->cashier_barcode, 14, 230, 90, 7);

    //   /**
    //    * table
    //    */
    //   Fpdf::SetFont('','B',11);
    //   Fpdf::SetFillColor(400,400,400);
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::setXY(10,238);
    //   Fpdf::Cell(40,4,"ACCOUNT NUMBER",1,0,'C',true);
    //   Fpdf::Cell(40,4,"REFERENCE NUMBER",1,0,'C',true);
    //   Fpdf::Cell(40,4,"DUE DATE",1,1,'C',true);
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::SetFont('Courier','B',11);
    //   Fpdf::setXY(10,248);
    //   Fpdf::Cell(40,4,$this->account_number,0,0,'C',false);
    //   Fpdf::Cell(40,4,$this->ref_number,0,0,'C',false);
    //   Fpdf::Cell(40,4,strtoupper($this->validity),0,1,'C',false);
    //   Fpdf::SetFont('Courier','',11 );
    //   Fpdf::setXY(10,255);
    //   Fpdf::MultiCell(40,4,'PLEASE USE THIS NUMBER WHEN PAYING YOUR APPLICATION FEE',0,'C',false);
    //   Fpdf::setXY(50,255);
    //   Fpdf::MultiCell(40,4,'THIS IS YOUR REFERENCE NUMBER',0,'C',false);
    //   Fpdf::setXY(90,255);
    //   Fpdf::MultiCell(40,4,'THIS VOUCHER IS VALID UNTIL THIS DATE',0,'C',false);

    //   /**
    //    * boxes
    //    */
    //   Fpdf::Rect(10, 242, 40, 30, 'D');
    //   Fpdf::Rect(50, 242, 40, 30, 'D');
    //   Fpdf::Rect(90, 242, 40, 30, 'D');

    //   /**
    //    * right-side info
    //    */
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::SetFont('Courier','B',10);
    //   Fpdf::setXY(130,195);
    //   Fpdf::Cell(50,4,"BANK/CASHIER'S COPY",0,1,'L',false);
    //   Fpdf::SetTextColor(0,0,0);
    //   Fpdf::setXY(132,220);
    //   Fpdf::MultiCell(75,4,"Any branch of LANDBANK OF THE PHILIPPINES (LBP) is authorized to receive payments for $this->company Service Request Payment",0,'L',false);
    //   Fpdf::setXY(132,245);
    // }

    // public function generate(){
    //   $this->_header();
    //   $this->_applicant();
    //   $this->_cashier();
    //   $this->_footer();
    //   Fpdf::output('D', 'my-voucher.pdf');
    // }
    
}