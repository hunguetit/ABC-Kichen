var ngayDaChon;// mang ds ngay dang ki, kieu boolean
var thuDaChon;// mang ds thu dang ki, kieu boolean
var ngayHienThi;// mang ngay dc hien thi
var thuHienThi;// mang thu dc hien thi
var soNgayBoQua;// so ngay dau tuan khong tinh

function chonNgay(index){//khi click vao o ngay co thu tu index
	if(index<soNgayBoQua) return;
	console.log(index);
	ngayDaChon[index]=!ngayDaChon[index];
	var j=index%7;
	thuDaChon[j]=false;
	document.getElementById("thu"+j).className="thuChuaChon";
	if(ngayDaChon[index]){
		document.getElementById("ngay"+index).className="ngayDaChon";
	}else{
		document.getElementById("ngay"+index).className="ngayChuaChon";
	}
	on();
}
function setNgayHienThi(nht){
	return ngayHienThi=nht;
}
function getDSNgayDaChon(){
	return ngayDaChon;
}
function getDSThuDaChon(){
	return thuDaChon;
}
function setDSNgayDaChon(ngayDC){
	ngayDaChon=ngayDC;
	for(i=soNgayBoQua;i<42;i++){
		ngayDaChon[i]=!ngayDaChon[i];
		chonNgay(i);
	}
}
function setDSThuDaChon(thuDC){
	thuDaChon=thuDC;
	for(i=0;i<7;i++){
		thuDaChon[i]=!thuDaChon[i];
		chonThu(i);
	}
}

function chonThu(index){//khi click vao o thu co thu tu index
	thuDaChon[index]=!thuDaChon[index];
	if(thuDaChon[index]){
		document.getElementById("thu"+index).className="thuDaChon";
		for(i=0;i<6;i++){
			j=index+i*7;
			if(j>=soNgayBoQua){
				document.getElementById("ngay"+j).className="ngayDaChon";
				ngayDaChon[j]=true;
			}
		}
	}else{
		document.getElementById("thu"+index).className="thuChuaChon";
		for(i=0;i<6;i++){
			j=index+i*7;
			if(j>=soNgayBoQua){
				document.getElementById("ngay"+j).className="ngayChuaChon";
				ngayDaChon[j]=false;
			}
		}
	}
	
	on();
}
function on(){// hien thi danh sach cac ngay dc chon
	var s="";
	for(i=0;i<42;i++){
		if(ngayDaChon[i]) {
			s+=i+1 +", ";
		}
	}
	document.getElementById("DSNgayDaChon").innerHTML= s;
}
function khoiTaoThuNgayDaChon(){
	ngayDaChon=new Array();
	for(i=0;i<42;i++){
		ngayDaChon[i]=false;
	}
	thuDaChon=new Array();
	for(i=0;i<7;i++){
		thuDaChon[i]=false;
	}
}
function khoiTaoThuNgayHienThi(ngay,thang,thu){
	soNgayBoQua=thu-2;
	ngayHienThi =new Array();
	thuHienThi = new Array();
	
	for(i=0;i<soNgayBoQua;i++){
		ngayHienThi[i]="-";
	}
	for(i=0;i<42-soNgayBoQua;i++){
		ngayHienThi[soNgayBoQua+i]=(ngay+i)+"/"+thang;
	}
	thu=2;
	for(i=0;i<7;i++){
		if(thu===8) {
			thu=1;
			thuHienThi[i]="Chủ Nhật";
		}else{
			thuHienThi[i]="Thứ "+thu;
		}
		
		thu++;
	}
}
function khoiTao(ngay,thang,thu){
	ngay=0;
	khoiTaoThuNgayDaChon();
	khoiTaoThuNgayHienThi(ngay,thang,thu);
	for(i=0;i<7;i++){
		document.getElementById("thu").appendChild(creatThu(i));
	}
	for(i=0;i<6;i++){
		var hang=document.getElementById("hang"+i);
		for(j=0;j<7;j++){
			hang.appendChild(creatNgay(ngay));
			ngay++;
		}
	}
}
function creatThu(thu){
	var th = document.createElement("th");//input
	th.appendChild(document.createTextNode(thuHienThi[thu]));
	th.id="thu"+thu;
	if(thuDaChon[thu]) {
		th.className="thuDaChon";
	}else{
		th.className="thuChuaChon";
	}
	th.onclick=function(){chonThu(thu)};
	return th;
}
function creatNgay(ngay){
	var td = document.createElement("td");
	td.onclick=function(){chonNgay(ngay)};
	if(ngayDaChon[ngay]) {
		td.className="ngayDaChon";
	}else{
		td.className="ngayChuaChon";
	}
	td.id="ngay"+ngay;
	td.appendChild(document.createTextNode(ngayHienThi[ngay]));
	return td;
}