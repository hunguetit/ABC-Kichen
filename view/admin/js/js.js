
var valueCB= new Array("null","1","2","3","4");
var textCB= new Array("Chon nguyen lieu:","Thit cho","gieng","mam tom","sa");
var valueComboboxChoise=new Array("null","t","g","m","s");
var nameComboboxChoise;
var valueDonvi;
var valueNumInput;
numConBobox=-1;// so luong combobox
var daXoa= new Array();
function setCB(value,text){
	valueCB=value;
	textCB=text;
}
function getValueCB(){
	get();
	return valueComboboxChoise;
}
function getSoLuong(){
	get();
	return valueNumInput;
}
function on(){
	get();
	for(i=0;i<valueComboboxChoise;i++){
		var div= document.getElementById("div");
		div.appendChild(document.createTextNode(nameComboboxChoise[i]+": "+valueNumInput));
		document.getElementById("nguyenLieu").appendChild(div);
		
	}
}
function get(){
	valueComboboxChoise = new Array();
	nameComboboxChoise = new Array();
	valueDonvi = new Array();
	valueNumInput = new Array();
	var j=0;
	for(i=0;i<numConBobox;i++){
		if(!daXoa[i]){
			var s= document.getElementById("cb"+i);
			valueComboboxChoise[j]=s.value;
			nameComboboxChoise[j]=s.name;
			var dv= document.getElementById("donVi"+i);
			valueDonvi[j]=dv.value;
			var t= document.getElementById("input"+i);
			valueNumInput[j]= t.value;
			j++;
		}	
	}
	return valueComboboxChoise+" "+valueNumInput;
}
function remove(index){
	var cb= document.getElementById("cb"+index);
	if(cb.value==="null") return;
	var d= document.getElementById("div"+(index));//all
	document.getElementById("listCBB").removeChild(d);
	daXoa[index]=true;
}
function khoiTao(){
	var cb= document.getElementById("dishType");// xoa chu chon nguyen lieu
	cb.remove(0);
	cb.onchange="";
	if(numConBobox>-1){
		var d= document.getElementById("div"+numConBobox);
		document.getElementById("listCBB").removeChild(d);
	}
	for(i=0;i<numConBobox;i++){
		if(!daXoa[i]){
			var d= document.getElementById("div"+i);
			document.getElementById("listCBB").removeChild(d);
		}
	}
	daXoa= new Array();
	numConBobox=-1;
	var div = document.createElement("div");
	div.id="div"+0;
	div.appendChild(document.createTextNode(" Nguyên liệu: "));
	var select = document.createElement("SELECT");// conbobox
	select.id = "cb"+0;
	for(i=0; i<valueCB.length;i++){
			var option = document.createElement("option");
			option.text = textCB[i];
			option.value = valueCB[i];
			select.add(option);
	}
	select.onchange=function(){change(0)};
	div.appendChild(select);
	
	div.appendChild(document.createTextNode(" Số lượng: "));
	var textInput = document.createElement("input");//input
	textInput.id = "input"+0;
	div.appendChild(textInput);
	
	div.appendChild(document.createTextNode(" Đơn vị: "));
	var textDonVi = document.createElement("input");//input don vi
	textDonVi.id = "donVi"+0;
	div.appendChild(textDonVi);
	
	var button = document.createElement("BUTTON");//button xóa
	button.appendChild(document.createTextNode("Xóa"));
	button.type="button";
	button.onclick=function(){remove(0)};//set sự kiện cho nút xóa
	div.appendChild(button);
	
	document.getElementById("listCBB").appendChild(div);//add div
	daXoa[0]=false;
	numConBobox=0;
	
}
function change(index){
	console.log("change"+index);
	
	var cbi_p= document.getElementById("cb"+index);
	if(cbi_p.value==="null") return;// chua chon gia tri cho combobox cũ
	
	if(index<numConBobox) return;//da tao combobox nay
	
	
	var cb= document.getElementById("cb"+index);// xoa chu chon nguyen lieu
	cb.remove(0);
	index++;
	var div = document.createElement("div");
	div.id="div"+index;
	
	div.appendChild(document.createTextNode(" Nguyên liệu: "));
	var select = document.createElement("SELECT");// conbobox
	select.id = "cb"+index;
	for(i=0; i<valueCB.length;i++){
			var option = document.createElement("option");
			option.text = textCB[i];
			option.value = valueCB[i];
			select.add(option);
	}
	select.onchange=function(){change(index)};
	div.appendChild(select);
	
	div.appendChild(document.createTextNode(" Số lượng: "));
	var textInput = document.createElement("input");//input so luong
	textInput.id = "input"+index;
	div.appendChild(textInput);
	
	div.appendChild(document.createTextNode(" Đơn vị: "));
	var textDonVi = document.createElement("input");//input don vi
	textDonVi.id = "donVi"+index;
	div.appendChild(textDonVi);
	
	var button = document.createElement("BUTTON");//button xóa
	button.appendChild(document.createTextNode("Xóa"));
	button.type="button";
	button.onclick=function(){remove(index)};//set sự kiện cho nút xóa
	div.appendChild(button);
	
	//document.getElementById("div"+(index-1)).appendChild(button);
	
	document.getElementById("listCBB").appendChild(div);//add div
	daXoa[index]=false;
	numConBobox=index;
}