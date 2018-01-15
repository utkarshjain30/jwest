<div class="current-video">
								<div class="embed-responsive embed-responsive-16by9 ">
									 <video style="background:#000;max-height:500px" id="my-video" class="video-js embed-responsive-item" height="auto" controls preload="auto" width="auto"
										  poster="<?php if(file_exists($video->media_thumb)){ echo base_url($video->media_thumb);}else{ echo base_url($this->lib->get_settings('default_thumb'));}?>" data-setup="{}">
											<source src="<?php echo $video->media_path;?>" type='video/mp4'>
											<source src="<?php echo $video->media_path;?>" type='video/flv'>
											
											<p class="vjs-no-js">
											  To view this video please enable JavaScript, and consider upgrading to a web browser that
											  <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
											</p>
										</video>
								</div>
							</div>