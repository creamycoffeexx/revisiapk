<!doctype html>
<html lang="en">

<head>

	<?php $this->load->view('_parts/style') ?>
</head>


<body>
	<!-- Begin page -->
	<div id="layout-wrapper">



		<?php $this->load->view('_parts/header') ?>
		<?php $this->load->view('_parts/sidebar') ?>

		<!-- ============================================================== -->
		<!-- Start right Content here -->
		<!-- ============================================================== -->
		<div class="main-content" style="margin-top:100px;">
			<div class="page-content">
				<div class="container-fluid">
					<div class="page-content-wrapper">
						<div class="mt-3">

							<h3 class=""><strong>Tambah  Petshop </strong></h3>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="card">
									<div class="card-body">
										<div class="p-0">
											<p>Berikut adalah form data Petshop. silahkan lengkapi data-data dibawah ini dengan lengkap dan benar</p>
											<hr />
											<form action="<?= site_url('admin/petshop/add') ?>" method="POST" enctype="multipart/form-data">
												<div class="form-group">
													<label>Nama Petshop</label>
													<input type="text" name="name" class="form-control" value="<?= set_value('name') ?>">
													<?= form_error('name') ?>
												</div>

												<div class="form-group">
													<label>Deskripsi</label>
													<textarea class="form-control" name="desc" rows="6" placeholder=""><?= set_value('desc') ?></textarea>
												</div>

												<div class="row">
													<div class="col-6"><label>Latitude</label>
														<input type="text" id="lat" name="lat" value="<?= set_value('lat') ?>" class="form-control">
														<?= form_error('lat') ?>
													</div>
													<div class="col-6"><label>Longitude</label>
														<input type="text" id="lng" name="lng" value="<?= set_value('lng') ?>" class="form-control">
														<?= form_error('lng') ?>
													</div>
												</div>

												<div class="row">
													<div class="col-6"><label>Tipe</label>
														<select name="type" id="type" class="form-control">
															<option value="">Petshop</option>
															<option value="-">Jalan</option>
														</select>
													</div>
												</div>

												<div class="form-group mt-2">
													<label>Image</label>
													<input type="file" name="userfile">
													<?= $this->session->userdata('errorUpload') ?>
												</div>

												<div class="form-group mt-3">
													<a href="<?= site_url('admin/petshop') ?>" class="btn btn-light">Kembali</a>
													<button class="btn btn-primary">Simpan</button>
												</div>

											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="card">
									<div class="card-body">
										<div id="map" style="height: 450px;width: 100%;"></div>
									</div>
								</div>
							</div>
						</div>

					</div>
				</div> <!-- container-fluid -->
			</div>
			<!-- End Page-content -->



			<?php $this->load->view('_parts/footer') ?>
		</div>
		<!-- end main content-->

	</div>
	<!-- END layout-wrapper -->

	<?php $this->load->view('_parts/js') ?>
	<script type="text/javascript">
		mapboxgl.accessToken = 'pk.eyJ1IjoiZWZoYWwiLCJhIjoiY2ptOXRiZ3k2MDh4bzNrbnljMjk5Z2d5aSJ9.8dSNgeAjpdTlZ3x-b2vsog';
		var map = new mapboxgl.Map({
			container: 'map', // container id
			style: 'mapbox://styles/mapbox/streets-v9', // stylesheet location
			center: [116.85559544814507, -1.238266838684179], // starting position [lng, lat]
			zoom: 10, // starting zoom
			logoPosition: 'top-right',
		});

		var marker;
		map.on('click', function(e) {
			if (marker) {
				marker.remove();
			}
			marker = new mapboxgl.Marker({
					color: "#7d000c",
				})
				.setLngLat(e.lngLat)
				.addTo(map);
			$("#lat").val(e.lngLat.lat);
			$("#lng").val(e.lngLat.lng);
		})

		var markers = [];

		$.ajax({
			'url': "<?= site_url('admin/graph/ajax/data') ?>",
			'type': 'POST',
			success: function(e) {
				var data_obj = JSON.parse(e);
				data_obj.forEach(function(i) {
					var color = i.type == '-' ? '#01f254' : '#015ff2';
					markers.push(new mapboxgl.Marker({
							color: color,
						})
						.setLngLat([i.lng, i.lat])
						.setPopup(new mapboxgl.Popup().setHTML(`
						<div class="card" style="width: 10rem;">
						<img src="<?= base_url('uploads/') ?>${i.picture}" class="card-img-top" alt="...">
							<div class="card-body">
								<h6 class="card-title">${i.name}</h6>
								${i.type == 'object' ? `<a href="<?= site_url('petshop/detail/') ?>${i.id}" class="btn btn-primary">Lihat detail</a>` : ''}
								</div>
							</div>
						`)) // add popup
						.addTo(map));
				})
			}

		});
	</script>
</body>

</html>
