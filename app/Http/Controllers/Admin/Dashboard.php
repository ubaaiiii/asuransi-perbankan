<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Redirector;
use Session;
// use App\ModelUser;
// use App\ModelCart;
// use App\ModelProduct;
// use App\ModelInvoice;

class Dashboard extends Controller
{


	public function enkripsi($id){
	 $encrypted = Crypt::encryptString($id);
	 
	 }

	public function dekripsi($id){
		 $decrypted = Crypt::decryptString($id);
	 }


    public function __construct(){
        if(Session::get('Admin_Login')){
            return redirect('/');
        }
        else{
            return redirect('/login');
        }
    }

    public function index(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();

            $id_user = Session::get('userid');
			$ulevel = Session::get('idLevel');
            $data = DB::select("select count(regid) sapp,sum(up) sup ,sum(premi) spremi  from tr_sppa    ");

            $spaid = 0;
            $saccept = 0;
            $sexcess = 0;

            foreach ($data as $d) {
                $spaid += $d->sapp;
                $saccept += $d->sup/1000000;
                $sexcess += $d->spremi/1000000;
            }

            $member = DB::table('tr_sppa')
                ->select('tr_sppa.regid')
				->where('tr_sppa.status','>', '0')
                ->count();


            return view('admin/home', [
                'spaid' => $spaid,
                'saccept' => $saccept,
                'sexcess' => $sexcess,
                'member' => $member,
            ]);

        }
        else{
            return redirect('/login');
        }
    }

    public function dashboard(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            return view('admin/dashboard/dashboard');
            // return view('admin/dashboard', ["userData"=>$userData ]);
        }
        else{
            return redirect('/login');
        }
    }

    public function profile(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			$sqlp="select ma.nama, ma.username,ma.level,mm.msdesc mitra,ma.email,ma.nohp,mc.msdesc cabang ";
			$sqlp= $sqlp . " ,mp.nama sparent  ";
			$sqlp= $sqlp . "  from ms_admin ma  ";
			$sqlp= $sqlp . "  left join  ms_master mm on mm.msid=ma.mitra   and mm.mstype ='mitra' ";
			$sqlp= $sqlp . "  left join  ms_master mc on mc.msid=ma.cabang   and mc.mstype ='cab'  ";
			$sqlp= $sqlp . "  left join  ms_admin mp on mp.username=ma.parent ";
			$sqlp= $sqlp . " where  ma.username ='$userid'  ";
			$profile = DB::select($sqlp); 
			
			$sqlm= " select msid,msdesc from ms_master  where mstype='mitra' order by msdesc asc ";
			$smitra = DB::select($sqlm); 
			
			$sqlc= " select msid,msdesc from ms_master  where mstype='cab' order by msdesc asc ";
			$scabang = DB::select($sqlc); 
			
            return view('admin/profile/profile',[
                'profiles' => $profile,
				'cabangs' => $scabang,
				'mitras' => $smitra
            ]);
        }
        else{
            return redirect('/login');
        }
    }


    public function userdetail($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			$sqlp="select ma.nama, ma.username,ma.level,mm.msdesc mitra,ma.email,ma.nohp,mc.msdesc cabang ";
			$sqlp= $sqlp . " ,mp.nama sparent  ";
			$sqlp= $sqlp . "  from ms_admin ma  ";
			$sqlp= $sqlp . "  left join  ms_master mm on mm.msid=ma.mitra   and mm.mstype ='mitra' ";
			$sqlp= $sqlp . "  left join  ms_master mc on mc.msid=ma.cabang   and mc.mstype ='cab'  ";
			$sqlp= $sqlp . "  left join  ms_admin mp on mp.username=ma.parent ";
			$sqlp= $sqlp . " where  ma.username ='$id' ";
			$userdtl = DB::select($sqlp); 
			
			$sqlm= " select msid,msdesc from ms_master  where mstype='mitra' order by msdesc asc ";
			$smitra = DB::select($sqlm); 
			
			$sqlc= " select msid,msdesc from ms_master  where mstype='cab' order by msdesc asc ";
			$scabang = DB::select($sqlc); 
			
            return view('admin/user/userdetail',[
                'userdtls' => $userdtl,
				'cabangs' => $scabang,
				'mitras' => $smitra
            ]);
        }
        else{
            return redirect('/login');
        }
    }

   

   

	//modul ajuan
	public function ajuan(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai,ab.jnsdoc, ";
			$sqlr= $sqlr . " ac.username uname,ad.msdesc sts from tr_sppa aa inner join tr_medical ab on aa.produk=ab.produk and aa.jkel=ab.jkel ";
			$sqlr= $sqlr . " left join ms_admin ac on ac.username=aa.createby ";
			$sqlr= $sqlr . " left join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			$sqlr= $sqlr . " left join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			$sqlr= $sqlr . " where aa.status='0' and aa.premi>0 and  ";
			$sqlr= $sqlr . " aa.usia between ab.umurb and ab.umura and aa.up BETWEEN ab.upb and ab.upa ";
			$sqlr= $sqlr . " order by aa.regid asc limit 100 ";
			$ajuan = DB::select($sqlr);

            return view('admin/ajuan/ajuan', [
                'ajuans' => $ajuan
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
		//modul ajuan
	public function batal(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai, ";
			$sqlr= $sqlr . " ac.username uname,ad.msdesc sts,date_format(ab.tglbatal,'%d/%m/%y') tglbatal";
			$sqlr= $sqlr . " from tr_sppa_cancel ab inner join tr_sppa aa  on aa.regid=ab.regid ";
			$sqlr= $sqlr . " inner join ms_admin ac on ac.username=aa.createby ";
			$sqlr= $sqlr . " inner join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			$sqlr= $sqlr . " inner join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			$sqlr= $sqlr . " where aa.premi>0 order by  ab.tglbatal desc  ";
			$sqlr= $sqlr . "  limit 100 ";
			$batal = DB::select($sqlr);

            return view('admin/batal/batal', [
                'batals' => $batal
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function klaim(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai, ";
			$sqlr= $sqlr . " ac.username uname,ad.msdesc sts,date_format(ab.tgllapor,'%d/%m/%y') tgllapor, ";
			$sqlr= $sqlr . " date_format(ab.tglkejadian,'%d/%m/%y') tglkejadian  ";
			$sqlr= $sqlr . " from tr_claim ab inner join tr_sppa aa  on aa.regid=ab.regid ";
			$sqlr= $sqlr . " inner join ms_admin ac on ac.username=aa.createby ";
			$sqlr= $sqlr . " inner join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			$sqlr= $sqlr . " inner join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			$sqlr= $sqlr . " where aa.premi>0 order by  ab.tgllapor desc  ";
			$sqlr= $sqlr . "  limit 100 ";
			$klaim = DB::select($sqlr);

            return view('admin/klaim/klaim', [
                'klaims' => $klaim
            ]);

        }
        else{
            return redirect('/login');
        }
    }

	public function klaimdetail($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%Y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%Y') mulai, ";
			$sqlr= $sqlr . " ac.username uname,ad.msdesc sts,date_format(ab.tgllapor,'%d/%m/%Y') tgllapor, ";
			$sqlr= $sqlr . " date_format(ab.tglkejadian,'%d/%m/%y') tglkejadian ,aa.policyno,al.msdesc jkel,  ";
			$sqlr= $sqlr . " aj.msdesc pekerjaan,ag.msdesc cabang,an.msdesc mitra,aa.produk,date_format(aa.akhir,'%d/%m/%Y') akhir ,aa.masa,ah.msdesc asuransi,";
			$sqlr= $sqlr . " aa.status,aa.comment ";
			$sqlr= $sqlr . " from tr_claim ab inner join tr_sppa aa  on aa.regid=ab.regid ";
			$sqlr= $sqlr . " inner join ms_admin ac on ac.username=aa.createby ";
			$sqlr= $sqlr . " inner join  (select msid,msdesc from ms_master where mstype='streq') ad  ";
			$sqlr= $sqlr . " left join (select msid,msdesc from ms_master where mstype='produk') ae on aa.produk=ae.msid "; 
			$sqlr= $sqlr . " left join (select msid,msdesc from ms_master where mstype='cab') ag on aa.cabang=ag.msid "; 
			$sqlr= $sqlr . " left join (select msid,msdesc from ms_master where mstype='mitra') an on aa.mitra=an.msid "; 
			$sqlr= $sqlr . " left join (select msid,msdesc from ms_master where mstype='kerja') af on aa.pekerjaan=af.msid "; 
			$sqlr= $sqlr . " left join (select msid,msdesc from ms_master where mstype='asuransi') ah on aa.asuransi=ah.msid "; 
			$sqlr= $sqlr . " left join (select msid,msdesc from ms_master where mstype='kerja') aj on aa.pekerjaan=aj.msid "; 
			$sqlr= $sqlr . " left join (select msid,msdesc from ms_master where mstype='jkel') al on aa.jkel=al.msid "; 
			$sqlr= $sqlr . " where aa.regid='$id'  ";
			$klaimdtl = DB::select($sqlr);

			

            return view('admin/klaim/klaimdetail', [
                'klaimdtls' => $klaimdtl
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	public function inquiry(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai,ab.jnsdoc, ";
			 $sqlr= $sqlr . " ac.username uname,ad.msdesc sts ";
			 $sqlr= $sqlr . "  from (select * from tr_sppa  limit 100 ) aa   ";
			 $sqlr= $sqlr . "  inner join tr_medical ab on aa.produk=ab.produk and aa.jkel=ab.jkel ";
			 $sqlr= $sqlr . " left join ms_admin ac on ac.username=aa.createby ";
			 $sqlr= $sqlr . " left join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			 $sqlr= $sqlr . " left join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			 $sqlr= $sqlr . " where aa.premi>0 and  ";
			 $sqlr= $sqlr . " aa.usia between ab.umurb and ab.umura and aa.up BETWEEN ab.upb and ab.upa ";
			$sqlr= $sqlr . " order by aa.regid desc limit 100 ";

			$inquiry = DB::select($sqlr);

            return view('admin/inquiry/inquiry', [
                'inquirys' => $inquiry
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	
	public function inquiryfind(Request $request){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			$sid = '%'.$request->get('q').'%';
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai,ab.jnsdoc, ";
			$sqlr= $sqlr . " ac.username uname,ad.msdesc sts from tr_sppa aa inner join tr_medical ab on aa.produk=ab.produk and aa.jkel=ab.jkel ";
			$sqlr= $sqlr . " left join ms_admin ac on ac.username=aa.createby ";
			$sqlr= $sqlr . " left join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			$sqlr= $sqlr . " left join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			$sqlr= $sqlr . " where  aa.premi>0 and  ";
			$sqlr= $sqlr . " aa.usia between ab.umurb and ab.umura and aa.up BETWEEN ab.upb and ab.upa ";
			$sqlr= $sqlr . "  and (aa.nama like '$sid' or aa.regid like '$sid'  or aa.noktp like '$sid'  or aa.nopeserta like '$sid' ) "; 
			$sqlr= $sqlr . "   order by aa.regid asc limit 100 ";

			$inquiry = DB::select($sqlr);

            return view('admin/inquiry/inquiryfind', [
                'inquirys' => $inquiry
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function cari($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai,ab.jnsdoc, ";
			 $sqlr= $sqlr . " ac.username uname,ad.msdesc sts from tr_sppa aa inner join tr_medical ab on aa.produk=ab.produk and aa.jkel=ab.jkel ";
			 $sqlr= $sqlr . " left join ms_admin ac on ac.username=aa.createby ";
			 $sqlr= $sqlr . " left join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			 $sqlr= $sqlr . " left join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			 $sqlr= $sqlr . " where aa.status='0' and aa.premi>0 and  ";
			 $sqlr= $sqlr . " aa.usia between ab.umurb and ab.umura and aa.up BETWEEN ab.upb and ab.upa ";
			$sqlr= $sqlr . "  where aa.nama like '%'+'$id'+'%' order by aa.regid asc limit 100 ";

			$inquiry = DB::select($sqlr);

            return view('admin/inquiry/inquiry', [
                'inquirys' => $inquiry
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	public function verifikasi(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai,ab.jnsdoc, ";
			 $sqlr= $sqlr . " ac.username uname,ad.msdesc sts from tr_sppa aa inner join tr_medical ab on aa.produk=ab.produk and aa.jkel=ab.jkel ";
			 $sqlr= $sqlr . " left join ms_admin ac on ac.username=aa.createby ";
			 $sqlr= $sqlr . " left join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			 $sqlr= $sqlr . " left join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			 $sqlr= $sqlr . " where aa.status='0' and aa.premi>0 and  ";
			 $sqlr= $sqlr . " aa.usia between ab.umurb and ab.umura and aa.up BETWEEN ab.upb and ab.upa ";
			$sqlr= $sqlr . " order by aa.regid asc limit 100 ";
			$verifikasi = DB::select($sqlr);

            return view('admin/verifikasi/verifikasi', [
                'verifikasis' => $verifikasi
            ]);

        }
        else{
            return redirect('/login');
        }
    }

	public function validasi(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai,ab.jnsdoc, ";
			$sqlr= $sqlr . " ac.username uname,ad.msdesc sts from tr_sppa aa inner join tr_medical ab on aa.produk=ab.produk and aa.jkel=ab.jkel ";
			$sqlr= $sqlr . " left join ms_admin ac on ac.username=aa.createby ";
			$sqlr= $sqlr . " left join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			$sqlr= $sqlr . " left join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			$sqlr= $sqlr . " where aa.status='0' and aa.premi>0 and  ";
			$sqlr= $sqlr . " aa.usia between ab.umurb and ab.umura and aa.up BETWEEN ab.upb and ab.upa ";
			$sqlr= $sqlr . " order by aa.regid asc limit 100 ";
			$validasi = DB::select($sqlr);

            return view('admin/validasi/validasi', [
                'validasis' => $validasi
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	
	
	public function cabang(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.msid,aa.msdesc   from ms_master aa where aa.mstype='cab' ";

			$cabang = DB::select($sqlr);

            return view('admin/cabang/cabang', [
                'cabangs' => $cabang
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	
	public function cabangdetail($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.msid,aa.msdesc   from ms_master aa where aa.mstype='cab' ";
			$sqlr= $sqlr . " and aa.msid='$id' ";
			$cabangdtl = DB::select($sqlr);

            return view('admin/cabang/cabangdetail', [
                'cabangdtls' => $cabangdtl
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	public function mitra(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.msid,aa.msdesc  from ms_master aa where aa.mstype='mitra' ";

			$mitra = DB::select($sqlr);

            return view('admin/mitra/mitra', [
                'mitras' => $mitra
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function mitradetail($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.msid,aa.msdesc  from ms_master aa where aa.mstype='mitra' and msid='$id'";

			$mitradtl = DB::select($sqlr);

            return view('admin/mitra/mitradetail', [
                'mitradtls' => $mitradtl
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	public function tarif(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			

			
			$sqlr="select distinct aa.produk code,ab.msdesc produk";
			$sqlr= $sqlr . " from tr_rates aa inner join ms_master ab on aa.produk=ab.msid where ab.mstype='produk'";
			$tarif = DB::select($sqlr);
            return view('admin/tarif/tarif', [
                'tarifs' => $tarif
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	
	public function tarifproduk($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			

			
			$sqlr="select distinct concat(aa.produk,aa.jkel,aa.umurb,aa.umura) scode,ab.msdesc produk,ac.msdesc jkel,aa.umurb,aa.umura,aa.insperiodmm,aa.sitype, ";
			$sqlr= $sqlr . "aa.minup,aa.maxup,aa.gpb,aa.gpa,aa.rates,aa.sitype  ";
			$sqlr= $sqlr . " from tr_rates aa inner join ms_master ab on aa.produk=ab.msid  ";
			$sqlr= $sqlr . "inner join ms_master ac on aa.jkel=ac.msid where ac.mstype='jkel'  and ab.mstype='produk'";
			$sqlr= $sqlr . " and aa.produk='$id'";
			$tarifp = DB::select($sqlr);
            return view('admin/tarif/tarifproduk', [
                'tarifps' => $tarifp
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	
	public function tarifdetail($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			

			
			$sqlr="select   ab.msdesc produk,ac.msdesc jkel,aa.umurb,aa.umura,aa.insperiodmm,aa.sitype, ";
			$sqlr= $sqlr . "aa.minup,aa.maxup,aa.gpb,aa.gpa,aa.rates,aa.sitype  ";
			$sqlr= $sqlr . " from tr_rates aa inner join ms_master ab on aa.produk=ab.msid  ";
			$sqlr= $sqlr . "inner join ms_master ac on aa.jkel=ac.msid where ac.mstype='jkel'  and ab.mstype='produk' ";
			$sqlr= $sqlr . " and concat(aa.produk,aa.jkel,aa.umurb,aa.umura)='$id'";
			$trfdtl = DB::select($sqlr);
            return view('admin/tarif/tarifdetail', [
                'trfdtls' => $trfdtl
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	public function tc(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.produk sproduk,aa.produk,aa.umurb,aa.umura,aa.maxup   from tr_term aa ";

			$tc = DB::select($sqlr);

            return view('admin/tc/tc', [
                'tcs' => $tc
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function tcdetail($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.produk sproduk,aa.produk,aa.umurb,aa.umura,aa.maxup   from tr_term aa where aa.produk='$id' ";

			$tcdetail = DB::select($sqlr);

            return view('admin/tc/tcdetail', [
                'tcdtls' => $tcdetail
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function medical(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select concat(aa.produk,aa.umurb,aa.umura,aa.upb,aa.upa,aa.jkel) scode, ";
			$sqlr= $sqlr . "aa.produk sproduk,aa.produk,aa.umurb,aa.umura,aa.upb minup,aa.upa maxup, ";
			$sqlr= $sqlr . "aa.jnsdoc,aa.jkel  ";
			$sqlr= $sqlr . "from tr_medical aa ";

			$medical = DB::select($sqlr);

            return view('admin/medical/medical', [
                'medicals' => $medical
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	
	public function medicaldetail($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.produk sproduk,aa.produk,aa.umurb,aa.umura,aa.upb minup,aa.upa maxup,";
			$sqlr= $sqlr . " aa.jnsdoc,aa.jkel   from tr_medical aa ";
			$sqlr= $sqlr . " where concat(aa.produk,aa.umurb,aa.umura,aa.upb,aa.upa,aa.jkel)='$id'";

			$meddet = DB::select($sqlr);

            return view('admin/medical/medicaldetail', [
                'meddets' => $meddet
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function bayar(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai, ";
			$sqlr= $sqlr . " ac.username uname,ad.msdesc sts,date_format(ab.paiddt,'%d/%m/%y') paiddt ";
			$sqlr= $sqlr . " from tr_sppa_paid ab ";
			$sqlr= $sqlr . " inner join tr_sppa aa  on aa.regid=ab.regid ";
			$sqlr= $sqlr . " inner join ms_admin ac on ac.username=aa.createby ";
			$sqlr= $sqlr . " inner join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			$sqlr= $sqlr . " inner join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			$sqlr= $sqlr . " where aa.premi>0 and ab.paidtype='PREMI'   ";
			$sqlr= $sqlr . " order by ab.paiddt desc limit 1000  ";
			$bayar = DB::select($sqlr);

            return view('admin/bayar/bayar', [
                'bayars' => $bayar
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function revisi(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai,ab.jnsdoc, ";
			$sqlr= $sqlr . " ac.username uname,ad.msdesc sts from tr_sppa aa inner join tr_medical ab on aa.produk=ab.produk and aa.jkel=ab.jkel ";
			$sqlr= $sqlr . " left join ms_admin ac on ac.username=aa.createby ";
			$sqlr= $sqlr . " left join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			$sqlr= $sqlr . " left join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			$sqlr= $sqlr . " where aa.status='0' and aa.premi>0 and  ";
			$sqlr= $sqlr . " aa.usia between ab.umurb and ab.umura and aa.up BETWEEN ab.upb and ab.upa ";
			$sqlr= $sqlr . " order by aa.regid asc limit 100 ";
			$revisi = DB::select($sqlr);

            return view('admin/revisi/revisi', [
                'revisis' => $revisi
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	
	public function rollback(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select ae.msdesc sproduk,aa.regid,aa.nama,aa.noktp,date_format(aa.tgllahir,'%d/%m/%y') tgllahir, ";
			$sqlr= $sqlr . " aa.up,aa.nopeserta,aa.up,aa.premi,date_format(aa.mulai,'%d/%m/%y') mulai,ab.jnsdoc, ";
			$sqlr= $sqlr . " ac.username uname,ad.msdesc sts from tr_sppa aa inner join tr_medical ab on aa.produk=ab.produk and aa.jkel=ab.jkel ";
			$sqlr= $sqlr . " left join ms_admin ac on ac.username=aa.createby ";
			$sqlr= $sqlr . " left join ms_master ad on ad.msid=aa.status and ad.mstype='STREQ' ";
			$sqlr= $sqlr . " left join ms_master ae on ae.msid=aa.produk and ae.mstype='produk' ";
			$sqlr= $sqlr . " where aa.status='0' and aa.premi>0 and  ";
			$sqlr= $sqlr . " aa.usia between ab.umurb and ab.umura and aa.up BETWEEN ab.upb and ab.upa ";
			$sqlr= $sqlr . " order by aa.regid asc limit 100 ";
			$rollback = DB::select($sqlr);

            return view('admin/rollback/rollback', [
                'rollbacks' => $rollback
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	
	public function billing(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.billno,date_format(ab.mulai,'%d-%m-%y') billdt,aa.policyno certno,aa.reffno regid,aa.grossamt,ab.nama,ab.up from tr_billing aa  ";
			$sqlr= $sqlr . " inner join tr_sppa ab on aa.reffno=ab.regid where aa.policyno<>'' ";
			$sqlr= $sqlr . " limit 100";
			$billing = DB::select($sqlr);

            return view('admin/billing/billing', [
                'billings' => $billing
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function bordero(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.borderono, aa.reffdt, aa.reffamt, aa.status, aa.branch, aa.period1, aa.period2, aa.produk  ";
			$sqlr= $sqlr . " from tr_bordero aa";
			$bordero = DB::select($sqlr);

            return view('admin/bordero/bordero', [
                'borderos' => $bordero
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function asuransi(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.asuransi kode ,aa.nmasuransi,aa.alamat1,aa.pic,aa.phone1,aa.picjabat,aa.email ";
			$sqlr=$sqlr . " from ms_insurance aa ";

			$asuransi = DB::select($sqlr);

            return view('admin/asuransi/asuransi', [
                'asuransis' => $asuransi
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	
	public function asuransidetail($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.asuransi kode ,aa.nmasuransi,aa.alamat1,aa.pic,aa.phone1,aa.picjabat,aa.email ";
			$sqlr=$sqlr . " from ms_insurance aa where aa.asuransi='$id' ";

			$asuransidtl = DB::select($sqlr);

            return view('admin/asuransi/asuransidetail', [
                'asuransidtls' => $asuransidtl
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function user(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqlr="select aa.username,aa.nama,aa.level,aa.cabang,aa.mitra,aa.parent  from ms_admin aa ";
			$user = DB::select($sqlr);

            return view('admin/user/user', [
                'users' => $user
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function logdet($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqll="select distinct  aa.regid,ab.msdesc stlog,aa.createdt,aa.createby,ma.nama,aa.comment  from tr_sppa_log aa ";
			$sqll= $sqll . "  inner join (select msid,msdesc from ms_master where mstype='streq') ab on aa.status=ab.msid "; 
			$sqll= $sqll . "  left join  ms_admin ma on ma.username =aa.createby ";
			$sqll= $sqll . " where aa.regid ='$id' order by aa.createdt desc ";
			$logdet = DB::select($sqll);


            return view('admin/logdet/logdet', [
                'logdets' => $logdet
            ]);

        }
        else{
            return redirect('/login');
        }
    }

	public function doc($id){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();
            $userid = Session::get('userid');
			
			$sqld="select  aa.regid,aa.nama_file ,aa.tipe_file,aa.tglupload  from tr_document aa ";
			$sqld= $sqld . " where aa.regid ='$id'  ";
			$sppadoc = DB::select($sqld); 



            return view('admin/doc/doc', [
                'docs' => $sppadoc
            ]);

        }
        else{
            return redirect('/login');
        }
    }

	

	public function ajuandetail($id){
	if(Session::get('Admin_Login')){

            $userid = Session::get('userid');
			$sqle="select  ab.regid,ab.nama,ab.noktp,al.msdesc jkel,aj.msdesc pekerjaan ,ad.msdesc cabang,ab.tgllahir,ab.mulai,ab.akhir,ab.masa,	";
			$sqle= $sqle . " ab.up,	ag.msdesc status,ab.createdt,ab.createby,ab.editdt,ab.editby,ab.validby,ab.validdt,ab.nopeserta,ab.usia,	";
			$sqle= $sqle . " ab.premi,ab.epremi,ab.tpremi,ab.bunga,ab.tunggakan,ac.msdesc produk,ae.msdesc mitra,ab.comment,ah.msdesc asuransi,ab.policyno ";
			$sqle= $sqle . " from ";
			$sqle= $sqle . " (select  aa.regid,aa.nama,aa.noktp,aa.jkel,aa.pekerjaan,aa.cabang,aa.tgllahir,aa.mulai,aa.akhir,aa.masa,	";
			$sqle= $sqle . " aa.up,	aa.status,aa.createdt,aa.createby,aa.editdt,aa.editby,aa.validby,aa.validdt,aa.nopeserta,aa.usia,	";
			$sqle= $sqle . " aa.premi,aa.epremi,aa.tpremi,aa.bunga,aa.tunggakan,aa.produk,aa.mitra,aa.comment,aa.asuransi,aa.policyno ";
			$sqle= $sqle . " from tr_sppa aa ";
			$sqle= $sqle . " where aa.regid='$id') ab "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='produk') ac on ab.produk=ac.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='cab') ad on ab.cabang=ad.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='mitra') ae on ab.mitra=ae.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='kerja') af on ab.pekerjaan=af.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='streq') ag on ab.status=ag.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='asuransi') ah on ab.asuransi=ah.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='kerja') aj on ab.pekerjaan=aj.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='jkel') al on ab.jkel=al.msid "; 
			$sppadt = DB::select($sqle); 

			$sqll="select  aa.regid,ab.msdesc stlog,aa.createdt,aa.createby,ma.nama  from tr_sppa_log aa ";
			$sqll= $sqll . "  inner join (select msid,msdesc from ms_master where mstype='streq') ab on aa.status=ab.msid "; 
			$sqll= $sqll . "  left join  ms_admin ma on ma.username =aa.createby ";
			$sqll= $sqll . " where aa.regid ='$id' order by aa.createdt desc ";
			$sppalog = DB::select($sqll); 
			
			$sqld="select  aa.regid,aa.nama_file ,aa.tipe_file,aa.tglupload  from tr_document aa ";
			$sqld= $sqld . " where aa.regid ='$id'  ";
			$sppadoc = DB::select($sqld); 	
            return view('admin/ajuan/ajuandetail', [
                'ajuandt' => $sppadt,
				'splog' => $sppalog,
				'spdoc' => $sppadoc
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
    public function ajuanedit($id){
	if(Session::get('Admin_Login')){

            $userid = Session::get('userid');
			$sqle="select  ab.regid,ab.nama,ab.noktp,ab.jkel,aj.msdesc pekerjaan ,ad.msdesc cabang,ab.tgllahir,ab.mulai,ab.akhir,ab.masa,	";
			$sqle= $sqle . " ab.up,	ag.msdesc status,ab.createdt,ab.createby,ab.editdt,ab.editby,ab.validby,ab.validdt,ab.nopeserta,ab.usia,	";
			$sqle= $sqle . " ab.premi,ab.epremi,ab.tpremi,ab.bunga,ab.tunggakan,ac.msdesc produk,ae.msdesc mitra,ab.comment,ah.msdesc asuransi,ab.policyno,ab.pekerjaan ";
			$sqle= $sqle . " from ";
			$sqle= $sqle . " (select  aa.regid,aa.nama,aa.noktp,aa.jkel,aa.pekerjaan,aa.cabang,aa.tgllahir,aa.mulai,aa.akhir,aa.masa,	";
			$sqle= $sqle . " aa.up,	aa.status,aa.createdt,aa.createby,aa.editdt,aa.editby,aa.validby,aa.validdt,aa.nopeserta,aa.usia,	";
			$sqle= $sqle . " aa.premi,aa.epremi,aa.tpremi,aa.bunga,aa.tunggakan,aa.produk,aa.mitra,aa.comment,aa.asuransi,aa.policyno ";
			$sqle= $sqle . " from tr_sppa aa ";
			$sqle= $sqle . " where aa.regid='$id') ab "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='produk') ac on ab.produk=ac.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='cab') ad on ab.cabang=ad.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='mitra') ae on ab.mitra=ae.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='kerja') af on ab.pekerjaan=af.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='streq') ag on ab.status=ag.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='asuransi') ah on ab.asuransi=ah.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='kerja') aj on ab.pekerjaan=aj.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='jkel') al on ab.jkel=al.msid "; 
			$sppadt = DB::select($sqle); 

			$sqlm= " select msid,msdesc from ms_master  where mstype='mitra' order by msdesc asc ";
			$mitra = DB::select($sqlm); 
			
			$sqlc= " select msid,msdesc from ms_master  where mstype='cab' order by msdesc asc ";
			$cabang = DB::select($sqlc); 
			
			$sqlm= " select msid,msdesc from ms_master  where mstype='kerja' order by msdesc asc ";
			$kerja = DB::select($sqlm); 
			
			$sqlc= " select msid,msdesc from ms_master  where mstype='JKEL' order by msdesc asc ";
			$jkel = DB::select($sqlc); 
			
            return view('admin/ajuan/ajuanedit', [
                'ajuanedts' => $sppadt,
				'smitra' => $mitra,
				'scabang' => $cabang,
				'skerja' => $kerja,
				'sjkel' => $jkel
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function ajuanadd(){
	if(Session::get('Admin_Login')){

            $userid = Session::get('userid');
			$sqls= " select * from tr_sppa  limit 1 ";
			$sppadt = DB::select($sqls); 
			
			
			$sqlm= " select msid,msdesc from ms_master  where mstype='mitra' and msid<>'ALL' order by msdesc asc ";
			$mitra = DB::select($sqlm); 
			
			$sqlc= " select msid,msdesc from ms_master  where mstype='cab' and msid<>'ALL' order by msdesc asc ";
			$cabang = DB::select($sqlc); 
			
			$sqlm= " select msid,msdesc from ms_master  where mstype='kerja' order by msdesc asc ";
			$kerja = DB::select($sqlm); 
			
			$sqlc= " select msid,msdesc from ms_master  where mstype='JKEL' order by msdesc asc ";
			$jkel = DB::select($sqlc); 
			
			$sqlm= " select msid,msdesc from ms_master  where mstype='produk'  and msid<>'ALL' order by msdesc asc ";
			$produk = DB::select($sqlm); 
			
			
            return view('admin/ajuan/ajuanadd', [
                'ajuanadds' => $sppadt,
				'smitra' => $mitra,
				'scabang' => $cabang,
				'skerja' => $kerja,
				'sjkel' => $jkel,
				'sproduk' => $produk
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	public function verifikasidetail($id){
	if(Session::get('Admin_Login')){

            $userid = Session::get('userid');
			$sqle="select  ab.regid,ab.nama,ab.noktp,al.msdesc jkel,aj.msdesc pekerjaan ,ad.msdesc cabang,ab.tgllahir,ab.mulai,ab.akhir,ab.masa,	";
			$sqle= $sqle . " ab.up,	ag.msdesc status,ab.createdt,ab.createby,ab.editdt,ab.editby,ab.validby,ab.validdt,ab.nopeserta,ab.usia,	";
			$sqle= $sqle . " ab.premi,ab.epremi,ab.tpremi,ab.bunga,ab.tunggakan,ac.msdesc produk,ae.msdesc mitra,ab.comment,ah.msdesc asuransi,ab.policyno ";
			$sqle= $sqle . " from ";
			$sqle= $sqle . " (select  aa.regid,aa.nama,aa.noktp,aa.jkel,aa.pekerjaan,aa.cabang,aa.tgllahir,aa.mulai,aa.akhir,aa.masa,	";
			$sqle= $sqle . " aa.up,	aa.status,aa.createdt,aa.createby,aa.editdt,aa.editby,aa.validby,aa.validdt,aa.nopeserta,aa.usia,	";
			$sqle= $sqle . " aa.premi,aa.epremi,aa.tpremi,aa.bunga,aa.tunggakan,aa.produk,aa.mitra,aa.comment,aa.asuransi,aa.policyno ";
			$sqle= $sqle . " from tr_sppa aa ";
			$sqle= $sqle . " where aa.regid='$id') ab "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='produk') ac on ab.produk=ac.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='cab') ad on ab.cabang=ad.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='mitra') ae on ab.mitra=ae.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='kerja') af on ab.pekerjaan=af.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='streq') ag on ab.status=ag.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='asuransi') ah on ab.asuransi=ah.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='kerja') aj on ab.pekerjaan=aj.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='jkel') al on ab.jkel=al.msid "; 
			$sppadt = DB::select($sqle); 

			$sqll="select  aa.regid,ab.msdesc stlog,aa.createdt,aa.createby,ma.nama  from tr_sppa_log aa ";
			$sqll= $sqll . "  inner join (select msid,msdesc from ms_master where mstype='streq') ab on aa.status=ab.msid "; 
			$sqll= $sqll . "  left join  ms_admin ma on ma.username =aa.createby ";
			$sqll= $sqll . " where aa.regid ='$id' order by aa.createdt desc ";
			$sppalog = DB::select($sqll); 
			
			$sqld="select  aa.regid,aa.nama_file ,aa.tipe_file,aa.tglupload  from tr_document aa ";
			$sqld= $sqld . " where aa.regid ='$id'  ";
			$sppadoc = DB::select($sqld); 	
            return view('admin/verifikasi/verifikasidetail', [
                'verifdts' => $sppadt,
				'veriflogs' => $sppalog,
				'verifdocs' => $sppadoc
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	public function validasidetail($id){
	if(Session::get('Admin_Login')){

            $userid = Session::get('userid');
			$sqle="select  ab.regid,ab.nama,ab.noktp,al.msdesc jkel,aj.msdesc pekerjaan ,ad.msdesc cabang,ab.tgllahir,ab.mulai,ab.akhir,ab.masa,	";
			$sqle= $sqle . " ab.up,	ag.msdesc status,ab.createdt,ab.createby,ab.editdt,ab.editby,ab.validby,ab.validdt,ab.nopeserta,ab.usia,	";
			$sqle= $sqle . " ab.premi,ab.epremi,ab.tpremi,ab.bunga,ab.tunggakan,ac.msdesc produk,ae.msdesc mitra,ab.comment,ah.msdesc asuransi,ab.policyno ";
			$sqle= $sqle . " from ";
			$sqle= $sqle . " (select  aa.regid,aa.nama,aa.noktp,aa.jkel,aa.pekerjaan,aa.cabang,aa.tgllahir,aa.mulai,aa.akhir,aa.masa,	";
			$sqle= $sqle . " aa.up,	aa.status,aa.createdt,aa.createby,aa.editdt,aa.editby,aa.validby,aa.validdt,aa.nopeserta,aa.usia,	";
			$sqle= $sqle . " aa.premi,aa.epremi,aa.tpremi,aa.bunga,aa.tunggakan,aa.produk,aa.mitra,aa.comment,aa.asuransi,aa.policyno ";
			$sqle= $sqle . " from tr_sppa aa ";
			$sqle= $sqle . " where aa.regid='$id') ab "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='produk') ac on ab.produk=ac.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='cab') ad on ab.cabang=ad.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='mitra') ae on ab.mitra=ae.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='kerja') af on ab.pekerjaan=af.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='streq') ag on ab.status=ag.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='asuransi') ah on ab.asuransi=ah.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='kerja') aj on ab.pekerjaan=aj.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='jkel') al on ab.jkel=al.msid "; 
			$sppadt = DB::select($sqle); 

			$sqll="select  aa.regid,ab.msdesc stlog,aa.createdt,aa.createby,ma.nama  from tr_sppa_log aa ";
			$sqll= $sqll . "  inner join (select msid,msdesc from ms_master where mstype='streq') ab on aa.status=ab.msid "; 
			$sqll= $sqll . "  left join  ms_admin ma on ma.username =aa.createby ";
			$sqll= $sqll . " where aa.regid ='$id' order by aa.createdt desc ";
			$sppalog = DB::select($sqll); 
			
			$sqld="select  aa.regid,aa.nama_file ,aa.tipe_file,aa.tglupload  from tr_document aa ";
			$sqld= $sqld . " where aa.regid ='$id'  ";
			$sppadoc = DB::select($sqld); 	
            return view('admin/validasi/validasidetail', [
                'validdts' => $sppadt,
				'validlogs' => $sppalog,
				'validdocs' => $sppadoc
            ]);

        }
        else{
            return redirect('/login');
        }
    }
	
	
	public function inquirydetail($id){
	if(Session::get('Admin_Login')){
			/* $id=base64_decode($id); */
            $userid = Session::get('userid');
			$sqle="select  ab.regid,ab.nama,ab.noktp,al.msdesc jkel,aj.msdesc pekerjaan ,ad.msdesc cabang,ab.tgllahir,ab.mulai,ab.akhir,ab.masa,	";
			$sqle= $sqle . " ab.up,	ag.msdesc status,ab.createdt,ab.createby,ab.editdt,ab.editby,ab.validby,ab.validdt,ab.nopeserta,ab.usia,	";
			$sqle= $sqle . " ab.premi,ab.epremi,ab.tpremi,ab.bunga,ab.tunggakan,ac.msdesc produk,ae.msdesc mitra,ab.comment,ah.msdesc asuransi,ab.policyno ";
			$sqle= $sqle . " from ";
			$sqle= $sqle . " (select  aa.regid,aa.nama,aa.noktp,aa.jkel,aa.pekerjaan,aa.cabang,aa.tgllahir,aa.mulai,aa.akhir,aa.masa,	";
			$sqle= $sqle . " aa.up,	aa.status,aa.createdt,aa.createby,aa.editdt,aa.editby,aa.validby,aa.validdt,aa.nopeserta,aa.usia,	";
			$sqle= $sqle . " aa.premi,aa.epremi,aa.tpremi,aa.bunga,aa.tunggakan,aa.produk,aa.mitra,aa.comment,aa.asuransi,aa.policyno ";
			$sqle= $sqle . " from tr_sppa aa ";
			$sqle= $sqle . " where aa.regid='$id') ab "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='produk') ac on ab.produk=ac.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='cab') ad on ab.cabang=ad.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='mitra') ae on ab.mitra=ae.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='kerja') af on ab.pekerjaan=af.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='streq') ag on ab.status=ag.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='asuransi') ah on ab.asuransi=ah.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='kerja') aj on ab.pekerjaan=aj.msid "; 
			$sqle= $sqle . " left join (select msid,msdesc from ms_master where mstype='jkel') al on ab.jkel=al.msid "; 
			$sppadt = DB::select($sqle); 

			$sqll="select  aa.regid,ab.msdesc stlog,aa.createdt,aa.createby,ma.nama  from tr_sppa_log aa ";
			$sqll= $sqll . "  inner join (select msid,msdesc from ms_master where mstype='streq') ab on aa.status=ab.msid "; 
			$sqll= $sqll . "  left join  ms_admin ma on ma.username =aa.createby ";
			$sqll= $sqll . " where aa.regid ='$id' order by aa.createdt desc ";
			$sppalog = DB::select($sqll); 
			
			$sqld="select  aa.regid,aa.nama_file ,aa.tipe_file,aa.tglupload  from tr_document aa ";
			$sqld= $sqld . " where aa.regid ='$id'  ";
			$sppadoc = DB::select($sqld); 	
            return view('admin/inquiry/inquirydetail', [
                'inquirydtls' => $sppadt,
				'inquirylogs' => $sppalog,
				'inquirydocs' => $sppadoc
            ]);

        }
        else{
            return redirect('/login');
        }
    }
    public function report(){
        if(Session::get('Admin_Login')){
            // $userData = ModelUser::get();

            $report = DB::table('ms_report')
                ->select('repcd','repname')
                ->where('repcat', 'clirep')
                ->get();

            $policyno = DB::table('tr_policy')
                ->select('tr_policy.policyno','tr_profile.clientname')
                ->join('tr_profile','tr_profile.clientcd','=','tr_policy.clientcd')
                ->whereIn('tr_policy.clientcd', function ($query) {
                    $id_user = Session::get('userid');
                    $query->select(DB::raw('ms_admin_profile.clientcd'))
                        ->from('ms_admin_profile')
                        ->where('ms_admin_profile.username', $id_user);
                })
                ->get();

            return view('admin/report', [
                'report' => $report,
                'policyno' => $policyno
            ]);
            // return view('admin/dashboard', ["userData"=>$userData ]);
        }
        else{
            return redirect('/login');
        }
    }


	public function ajuan_aksi(Request $req)
    {
        $regid = '1212121212';
		$nama = $req->input('regid');
		$notkp = $req->input('regid');
		
        
		tr_sppa::create(['regid' => $regid],
		['nama' => $nama],
		['noktp' => $noktp]
		);
        return redirect('regid')->with('success','Aplikasi telah disimpan');
    }

	/* public function kategori_aksi(Request $req)
    {
        $nama = $req->input('nama');
        Kategori::create(['kategori' => $nama]);
        return redirect('kategori')->with('success','Kategori telah disimpan');
    }

    public function kategori_update($id, Request $req)
    {
        $nama = $req->input('nama');
        $kategori = Kategori::find($id);
        $kategori->kategori = $nama;
        $kategori->save();
        return redirect('kategori')->with('success','Kategori telah diupdate');
    }

    public function kategori_delete($id)
    {
        $kategori = Kategori::find($id);
        $kategori->delete();

        $tt = Transaksi::where('kategori_id',$id)->get();

        if($tt->count() > 0){
            $transaksi = Transaksi::where('kategori_id',$id)->first();
            $transaksi->kategori_id = "1";
            $transaksi->save();
        }
        return redirect('kategori')->with('success','Kategori telah dihapus');
    } */
   
   // method untuk hapus data pegawai
	public function ajuan_delete($id)
	{
	// menghapus data pegawai berdasarkan id yang dipilih
	DB::table('tr_sppa')->where('regid',$id)->delete();
		
	// alihkan halaman ke halaman pegawai
	return redirect('/ajuan');
	}
	
/* 	public function hitung_umur($stgllahir,$smulai){
	$birthDate = new DateTime($stgllahir);
	$today = new DateTime($smulai);
	if ($birthDate > $today) { 
	    exit("0 tahun 0 bulan 0 hari");
	}
	$y = $today->diff($birthDate)->y;
	$m = $today->diff($birthDate)->m;
	$d = $today->diff($birthDate)->d;
	return $y;
	} */
	
	public function ajuan_add(Request $request){

		if(Session::get('Admin_Login')){
        $userid = Session::get('userid');	
		$sqll = "SELECT concat(concat(prevno,DATE_FORMAT(now(),'%y%m')),right(concat(formseqno,b.lastno),formseqlen)) as seqno ";
		$sqll = $sqll . " from  tbl_lastno_form a  left join tbl_lastno_trans  b on a.trxid=b.trxid  ";
		$sqll = $sqll = $sqll . " where a.trxid= 'regid'";
		$noregid = DB::select($sqll); 
		
		$sregid = $noregid[0]->seqno;
		$sqln  = "update tbl_lastno_trans  set lastno=lastno+1 where trxid= 'regid'";
		DB::update(DB::RAW($sqln));
		
		$sproduk=$request->produk;
		$sup=$request->up;
		$sjkel=$request->jkel;
		$smulai=$request->mulai;
		$smasa=$request->masa;
		$stgllahir=$request->tgllahir;
		$stglakhir = date('Y-m-d', strtotime('+' . $smasa. 'months', strtotime($smulai))); //operasi penjumlahan tanggal sebanyak x bulan
		$sqlq = "select  round(datediff('$smulai','$stgllahir')/365,0) usia, rates,bunga,ratesother,tunggakan ";
	    $sqlq = $sqlq . " from  tr_rates  ";
		$sqlq = $sqlq . " where produk='$sproduk' and insperiodmm='$smasa' and jkel='$sjkel' ";
		$sqlq = $sqlq . "  and  round(datediff('$smulai','$stgllahir')/365,0) between umurb and umura "; 
		$sqlq = $sqlq . "  and $sup between minup and maxup ";
		$srate = DB::select($sqlq); 
		$trate = $srate[0]->rates;
		$susia = $srate[0]->usia;
		$sratesother = $srate[0]->ratesother;
		$sbunga = $srate[0]->bunga;
		$stunggakan = $srate[0]->tunggakan;
		$spremi=$request->up*$trate/100;
		$sepremi=$request->up*$trate/100;
		$stpremi=$request->up*$trate/100;
		$sbunga=$trate;
		$stunggakan=$request->up*$trate/100;
		
		// insert data ke table pegawai
		DB::table('tr_sppa')->insert([
			'regid' => $sregid,
			'nama' => $request->nama,
			'noktp' => $request->noktp,
			'tgllahir' => $request->tgllahir,
			'jkel' => $request->jkel,
			'up' => $request->up,
			'mulai' => $request->mulai,
			'akhir' => $stglakhir,
			'masa' => $request->masa,
			'cabang' => $request->cabang,
			'mitra' => $request->mitra,
			'pekerjaan' => $request->pekerjaan,
			'usia' => $susia,
			'premi' => $spremi,
			'epremi' => $sepremi,
			'tpremi' => $stpremi,
			'bunga' => $sbunga,
			'produk' => $request->produk,
			'comment' => $request->comment,
			'tunggakan' => $stunggakan,
			'createdt' => now(),
			'createby' => $userid,
			'status' => '0'
		]);
		
		
		DB::table('tr_sppa_log')->insert([
			'regid' => $sregid,
			'status' => '0',
			'comment' => $request->comment,
			'createby' => $userid,
			'createdt' => now()
		]);
		
        /* return "Nama : ".$nama.", noktp : ".$noktp; */
		/* return redirect()->back()->with("success","Transaksi telah disimpan!");  */
		/* return redirect('/ajuanedit/', [$sregid]); */
		
		/* return redirect('{{url('/ajuanedit/'.<?php echo sregid; ?>)}}') */
		/* return redirect()->route('/ajuanedit', [$sregid]); */
		 return redirect('/ajuan');
		 }
	}
	
	public function ajuan_edit(Request $request){

		if(Session::get('Admin_Login')){
        $userid = Session::get('userid');	
		
		$sregid=$request->regid;
		$sproduk=$request->produk;
		$sup=$request->up;
		$sjkel=$request->jkel;
		$smulai=$request->mulai;
		$smasa=$request->masa;
		$stgllahir=$request->tgllahir;
		$stglakhir = date('Y-m-d', strtotime('+' . $smasa. 'months', strtotime($smulai))); //operasi penjumlahan tanggal sebanyak x bulan
		$sqlq = "select  round(datediff('$smulai','$stgllahir')/365,0) usia, rates,bunga,ratesother,tunggakan ";
	    $sqlq = $sqlq . " from  tr_rates  limit 1 ";
		/* $sqlq = $sqlq . " where produk='$sproduk' and insperiodmm='$smasa' and jkel='$sjkel' ";
		$sqlq = $sqlq . "  and  round(datediff('$smulai','$stgllahir')/365,0) between umurb and umura ";  */
/* 		$sqlq = $sqlq . "  and $sup between minup and maxup "; */
		$srate = DB::select($sqlq); 
		$trate = $srate[0]->rates;
		$susia = $srate[0]->usia;
		$sratesother = $srate[0]->ratesother;
		$sbunga = $srate[0]->bunga;
		$stunggakan = $srate[0]->tunggakan;
		/* $spremi=$request->up*$trate/100;
		$sepremi=$request->up*$trate/100;
		$stpremi=$request->up*$trate/100;
		$sbunga=$trate;
		$stunggakan=$request->up*$trate/100; */
		
		// update data ke table tr_sppa
		DB::table('tr_sppa')
            ->where('regid',$sregid)
            ->update([
			'nama' => $request->nama,
			'noktp' => $request->noktp,
			'tgllahir' => $request->tgllahir,
			'jkel' => $request->jkel,
			'mulai' => $request->mulai

			]);

		 return redirect('/ajuan');
		 }
		 
		 
		
	}
	
	public function docadd(){
	if(Session::get('Admin_Login')){

            $userid = Session::get('userid');
			
			
	
			$sqlm= " select msid,msdesc from ms_master  where mstype='doc'  asc ";
			$produk = DB::select($sqlm); 
			
			
            return view('admin/ajuan/ajuanadd', [
				'sproduk' => $produk
            ]);

        }
        else{
            return redirect('/login');
        }
    }
}
