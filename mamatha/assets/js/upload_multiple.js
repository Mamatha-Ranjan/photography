$(document).ready(function()
{
	$("#file").change(function()
	{
		var src=$("#file").val();
		if(src!="")
		{
			formdata= new FormData();
			var numfiles=this.files.length;
			var i, file, progress, size;
			for(i=0;i<numfiles;i++)
			{
				file = this.files[i];
				size = this.files[i].size;
				name = this.files[i].name;
				if (!!file.type.match(/image.*/))
				{
					/*if((Math.round(size))<=(1024*1024))
					{*/
						var reader = new FileReader();
						reader.readAsDataURL(file);
						$("#preview").show();
						$('#preview').html("");
						reader.onloadend = function(e)
						{
						var image = $('<img>').attr('src',e.target.result);
						$(image).appendTo('#preview');
						};
						formdata.append("file[]", file);
						if(i==(numfiles-1))
						{
							$("#info").html("wait a moment to complete upload");
							$.ajax(
							{
								url: "../homepage/upload_candid_images",
								type: "POST",
								data: formdata,
								dataType: "json", // Set the data type so jQuery can parse it for you
								processData: false,
								contentType: false,
								success: function(res)
								{
									count = res.length;
									for(i=0 ; i<count ; i++)
									{
										
										var ret = res[i].split("-");
										var id = ret[0];
										var path = ret[1];
										pathh = "../candid/";
										var spantag = "<span id='"+id+"'>";
										$(spantag).appendTo('#preview');
										var image = $('<img>').attr('src',pathh+path);
										$(image).appendTo('#'+id);
										var aref = "<span style='cursor: pointer;' onclick='deleteimg("+id+")'>X</span>";
										$(aref).appendTo('#'+id);
									}
									return false;
									if(res!="0")
										$("#info").html("Successfully Uploaded");
									else
										$("#info").html("Error in upload. Retry");
								}
							});
						}
					/*}
					else
					{
						$("#info").html(name+"Size limit exceeded");
						$("#preview").hide();
						return;
					}*/
				}
				else
				{
					$("#info").html(name+"Not image file");
					$("#preview").hide();
					return;
				}
			}
		}
		else
		{
			$("#info").html("Select an image file");
			$("#preview").hide();
			return;
		}
		return false;
	});
});
