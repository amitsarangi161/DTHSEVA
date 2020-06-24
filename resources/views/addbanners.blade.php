@extends('layouts.app')
@section('content')

<input type="hidden" name="_token" value="EhD9AEnQI3c7dzVpl7m1ZaOaklWKq1Eplmw8hYIp">
	<table class="table table-responsive table-hover table-bordered table-striped">
		<tbody>
        <tr>
			<td colspan="2" class="text-center bg-navy">ADD BANNERS</td>
		</tr>		

        <?php for( $i = 1; $i !== 6; $i++ ): ?>
            <tr>
        <td>
            <div class="form-group">
                <label class="col-sm-2 control-label">Banner Image <?php echo $i; ?></label>
                <div class="col-sm-8">
                    <input name="image" type="file" onchange="readURL(this, <?php echo $i; ?>);">
                    <p class="help-block">Upload .png, .jpg or .jpeg image files only</p>
                </div>
            </div>
        </td>
        
        <td>
            <?php 
            $path = BANNER_PATH . 'banner_' . $i . '.jpg';
            
            if ( file_exists($path) ) {
                $modi = fileatime($path);
                ?>
                    <a href="delete.php?i=<?php echo $i ?>">
                        <div style="height:70px;width:95px;background-image: url('/banners/banner_<?php echo $i ?>.jpg?<?php echo $modi; ?>');/* background-image: url(); */background-size: cover;display: inline-block;background-position: center;"></div>
                    </a>
                <?php
            } else {
                echo "No banner uploaded";
            }
            ?>
            
        </td>
        <?php endfor;?>
        
			  
</tbody></table>


<script type="text/javascript">

function readURL(input, bannerNo) {

	if (input.files && input.files[0]) {
    
        var form = new FormData();
            form.append('file', input.files[0]);
            form.append('bannerNo', bannerNo);

				$.ajax({
					url: '/upload.php',
                    dataType: 'JSON',
                    method: 'POST',
					data: form,
					processData: false,
					contentType: false,
					beforeSend: function() {
						$(input).hide();
					},
					success: function () {
						// if all is well
						// play the audio file
						window.location.reload();
					}
				});

                

	}
}





</script>

@endsection