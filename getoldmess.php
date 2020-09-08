<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Get Old Mess Kiet Nguyen</title>
</head>
<body>
	<div class="container" style="width: 60%;">
		<div class="card">
			<div class="card-header">
				XEM LẠI TIN NHẮN CŨ - KIỆT NGUYỄN IT
			</div>
			<div class="card-body">
				<form>
					<div class="form-group">
						<label for="link1">Link FB của bạn</label>
						<input type="text" class="form-control" id="link1" placeholder="nhập ở đây là link fb bạn nhé!">
					</div>
					<div class="form-group">
						<label for="link2">Link FB của người ấy</label>
						<input type="text" class="form-control" id="link2" placeholder="link fb người ấy đây nhé !">
					</div>
					<div id="wrap-btn">
						<a type="button" class="btn btn-primary" id="ok">OK</a>
					</div>
				</form>
			</div>
			<div class="card-footer text-muted">
				Create by KietNguyenIt
			</div>
		</div>

	</div>
	
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
		function getId(link){
			return new Promise((resolve, reject) => {
				var objData = new FormData();
				objData.append('link', link);
				objData.append('getid', 'Tìm kiếm uid');
				$.ajax({
					url: 'https://id.atpsoftware.vn/',
					dataType: 'text',
					contentType: false,
					processData: false,
					data: objData,
					type: 'post',
					success: function(res){
						var element = /<span class='uid-result' >\d+<\/span>/.exec(res)[0];
						var id = /\d+/.exec(element)[0];
						resolve(id);
					}
				});
			});
		}

		async function run(){
			let id1, id2, url;
			try{
				$('#ok').on('click', async function(){	
					$('#wrap-btn').html("<div class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>");
					id1 = await getId($('#link1').val());
					id2 = await getId($('#link2').val());
					url = 'https://m.facebook.com/messages/read/?tid=cid.c.' + id1+ '%3A' + id2 + '&entrypoint=web%3Atrigger%3Athread_list_thread&first_message_timestamp';
					window.location.replace(url);

				});
			}catch(err){
				console.log(err);
			}
		}

		run();

	</script>
</body>
</html>