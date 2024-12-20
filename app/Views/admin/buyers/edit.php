<?= $this->extend('admin/template/template'); ?>
<?= $this->section('content'); ?>

<div class="app-content pt-3 p-md-3 p-lg-4">
    <div class="container-xl">
        <h1 class="app-page-title">Ubah Buyers</h1>
        <hr class="mb-4">
        <div class="row g-4 settings-section">
            <div class="col-12 col-md-8">
                <div class="app-card app-card-settings shadow-sm p-4">
                    <div class="card-body">
                        <form action="<?= base_url('admin-update-buyers/' . $buyers['id_buyers']) ?>" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Nama Perusahaan</label>
                                <input type="text" class="form-control" name="nama_perusahaan" value="<?= $buyers['nama_perusahaan'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Negara</label>
                                <select class="form-select" id="negara_perusahaan" name="negara_perusahaan" required>
                                    <option value="" selected disabled>Pilih Negara Perusahaan</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kode HS</label>
                                <input type="text" class="form-control" name="hs_code" value="<?= $buyers['hs_code'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" name="email_perusahaan" value="<?= $buyers['email_perusahaan'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Website</label>
                                <input type="text" class="form-control" name="website_perusahaan" value="<?= $buyers['website_perusahaan'] ?>" required>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn text-white" style="background-color: #03AADE;">Simpan</button>
                                <a href="<?= base_url('admin-buyers') ?>" class="btn btn-secondary">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div><!--//app-card-->
            </div>
        </div><!--//row-->
        <hr class="my-4">
    </div><!--//container-fluid-->
</div><!--//app-content-->

<script>
    // Set the country from PHP as a JavaScript variable
    const selectedCountry = "<?php echo $buyers['negara_perusahaan']; ?>";

    // Function to fetch and populate country dropdown
    function populateCountryDropdown(selectElementId) {
        fetch('https://restcountries.com/v3.1/all')
            .then(response => response.json())
            .then(data => {
                const selectElement = document.getElementById(selectElementId);

                // Clear existing options and add the default option
                selectElement.innerHTML = '<option value="" selected disabled>Pilih Negara Perusahaan</option>';

                // Sort countries alphabetically
                data.sort((a, b) => a.name.common.localeCompare(b.name.common));

                // Add countries to dropdown and set selected if it matches
                data.forEach(country => {
                    const option = document.createElement('option');
                    option.value = country.name.common;
                    option.textContent = country.name.common;
                    if (country.name.common === selectedCountry) {
                        option.selected = true;
                    }
                    selectElement.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching country data:', error));
    }

    // Call function on page load
    document.addEventListener('DOMContentLoaded', function() {
        populateCountryDropdown('negara_perusahaan');
    });
</script>

<?= $this->endSection('content') ?>