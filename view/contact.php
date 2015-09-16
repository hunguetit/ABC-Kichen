
<!--==============================content================================-->
<section id="content">
	<div class="main">
		<div class="wrapper">
			<article class="col-1">
				<div class="indent-left">
					<h3 class="p1">Liên hệ chúng tôi</h3>
					<figure class="indent-bot">
						<div id="googleMap" style="width:280px;height:200px;"></div>						
					</figure>
					<dl>
						<dd><span>Địa chỉ:</span> 144 Xuân Thủy, Cầu Giấy, Hà Nội</dt>
						<dd><span>Điện thoại:</span> 1800-0828</dd>
						<dd><span>Email:</span><a class="color-2" href="#">kitchen@ABCCompany.com</a></dd>
					</dl>
				</div>
			</article>
			
			<article class="col-2">
				<h3 class="p1">Thông tin</h3>
				<form id="contact-form" action="#" method="post" enctype="multipart/form-data">
					<fieldset>
						<label>
							<span class="text-form">Họ và tên:</span>
							<input name="name" type="text" />
						</label>
						<label>
							<span class="text-form">Email:</span>
							<input name="email" type="text" />
						</label>
						<label>
							<span class="text-form">Số điện thoại:</span>
							<input name="phone" type="text" />
						</label>
						<div class="wrapper">
							<div class="text-form">Tin nhắn:</div>
							<div class="extra-wrap">
								<textarea></textarea>
								<div class="clear"></div>
								<div class="buttons"> <a class="button-2" href="#">Gửi</a> </div>
							</div>
						</div>
					</fieldset>
				</form>
			</article>
		</div>
	</div>
</section>


<script
src="http://maps.googleapis.com/maps/api/js">
</script>

<script>
function initialize() {
  var mapProp = {
    center:new google.maps.LatLng(21.037743,105.781418),
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
  };
  var map=new google.maps.Map(document.getElementById("googleMap"), mapProp);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script>