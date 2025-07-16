<?php
  include 'server/Database.php';
  $query = "SELECT * FROM `brgy_info` LIMIT 1";
  $result = $conn->query($query);

  $row = $result->fetch_assoc();
  $path = "storage/barangay_img/";
  $city_logo = ($row['city_logo'] != null) ? $path.$row['city_logo'] : $path. "philippine_logo.png";
  $brgy_logo = ($row['brgy_logo'] != null) ? $path.$row['brgy_logo'] : $path. "philippine_logo.png";
?>
<!-- Edit Modal -->
<div class="modal fade" id="editBarangayInfo" data-backdrop="static" data-keyboard="false">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Barangay Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="editBarangayInfoForm" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="row">
            <input type="hidden" name="id" value="<?=$row['id']?>">
             <div class="form-group col-lg-6 col-md-12">
                <label>Province<sup class="text-danger">*</sup></label>
                <select class="form-control" name="province" id="province">
                  <option disabled selected>Select an option</option>
                </select>
                <small class="text-danger" id="province_edit_error"></small>
            </div>
            <div class="form-group col-lg-6 col-md-12">
                <label>Town<sup class="text-danger">*</sup></label>
                <select class="form-control" name="town" id="town" >
                  <option disabled selected>Select an option</option>
                </select>
                <small class="text-danger" id="town_edit_error"></small>
            </div>
            <div class="form-group col-lg-6 col-md-12">
               <label>Barangay<sup class="text-danger">*</sup></label>
                <select class="form-control" name="brgy_name" id="brgy_name">
                  <option disabled selected>Select an option</option>
                </select>
                <small class="text-danger" id="brgy_name_edit_error"></small>
            </div>
            <div class="form-group  col-lg-6 col-md-12">
              <label>Contact Number<sup class="text-danger">*</sup></label>
              <input type="text" name="number" class="form-control" placeholder="Enter Contact number" value="<?=$row['number']?>">
              <small class="text-danger" id="number_edit_error"></small>
            </div>
            <div class="form-group  col-lg-6 col-md-12">
              <label>Mission<sup class="text-danger">*</sup></label>
              <textarea class="form-control" name="mission" rows="6"><?=$row['mission']?></textarea>
              <small class="text-danger" id="mission_edit_error"></small>
              </div>
            <div class="form-group  col-lg-6 col-md-12">
              <label>Vision<sup class="text-danger">*</sup></label>
              <textarea class="form-control" name="vision" rows="6"><?=$row['vision']?></textarea>
              <small class="text-danger" id="vision_edit_error"></small>
            </div>
            <div class="form-group col-lg-6 col-md-12 d-flex flex-column">
               <img class="mx-auto" src="<?=$city_logo?>" alt="City Logo" width="200px" height="auto" loading="eager" decoding="sync">
               <div>
                 <label>Municipality/City Logo(Optional)</label>
                 <input type="file" name="city_logo" class="form-control p-0 pt-1 pl-1 m-0">
               </div>
            </div>
            <div class="form-group col-lg-6 col-md-12  d-flex flex-column">
              <img class="mx-auto" src="<?=$brgy_logo?>" alt="Barangay Logo" width="150px" height="auto" loading="eager" decoding="sync">
              <div>
                <label>Barangay Logo(Optional)</label>
                <input type="file" name="brgy_logo" class="form-control p-0 pt-1 pl-1 m-0">
              </div>
            </div> 
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="editBarangayInfo" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const provinceAPI = "https://psgc.gitlab.io/api/island-groups/luzon/provinces/";
  let regionCode; // Declare regionCode variable
  let citiesMunicipalitiesCode;

  // Function to fetch provinces
  async function fetchProvinces() {
    try {
      const response = await fetch(provinceAPI);
      const data = await response.json();
      
      // Sort the data based on the province names
      data.sort((a, b) => a.name.localeCompare(b.name));
      const provinceElement = document.getElementById('province');
      
      // Populate the dropdown with provinces
      data.forEach(row => {
        provinceElement.innerHTML += `<option value='${row.name}' data-region-code='${row.regionCode}'>${row.name}</option>`;
      });

      // Set the default selected province
      provinceElement.value = '<?=$row['province']?>';

      // Fetch cities and municipalities for the default province
      fetchCitiesMunicipalities();

      // Add event listener to display the region code
      provinceElement.addEventListener('change', fetchCitiesMunicipalities);
    } catch (error) {
      console.error("Error fetching provinces: ", error);
      alert("No Internet connection.");
    }
  }

  // Function to fetch cities and municipalities
  async function fetchCitiesMunicipalities() {
    const selectedOption = document.getElementById('province').options[document.getElementById('province').selectedIndex];
    regionCode = selectedOption.getAttribute('data-region-code'); // Set regionCode based on selection
    const citiesMunicipalitiesAPI = `https://psgc.gitlab.io/api/regions/${regionCode}/cities-municipalities/`;

    try {
      const response = await fetch(citiesMunicipalitiesAPI);
      const data = await response.json();
      
      // Sort the data based on the municipality names
      data.sort((a, b) => a.name.localeCompare(b.name));
      const townElement = document.getElementById('town');
      townElement.innerHTML = ''; // Clear previous options
      
      data.forEach(row => {
        townElement.innerHTML += `<option value='${row.name}' data-mc-code='${row.code}'>${row.name}</option>`;
      });

      // Set the default selected town
      townElement.value = '<?=$row['town']?>';

      // Fetch barangays for the default town
      fetchBarangays();

      townElement.addEventListener('change', fetchBarangays);
    } catch (error) {
      console.error("Error fetching cities and municipalities: ", error);
      alert("No Internet connection.");
    }
  }

  // Function to fetch barangays
  async function fetchBarangays() {
    const selectedOption = document.getElementById('town').options[document.getElementById('town').selectedIndex];
    citiesMunicipalitiesCode = selectedOption.getAttribute('data-mc-code');
    const barangayAPI = `https://psgc.gitlab.io/api/cities-municipalities/${citiesMunicipalitiesCode}/barangays/`;

    try {
      const response = await fetch(barangayAPI);
      const data = await response.json();
      
      // Sort the data based on the barangay names
      data.sort((a, b) => a.name.localeCompare(b.name));
      const barangayElement = document.getElementById('brgy_name');
      barangayElement.innerHTML = ''; // Clear previous options
      
      data.forEach(row => {
        barangayElement.innerHTML += `<option value='${row.name}'>${row.name}</option>`;
      });

      // Set the default selected barangay
      barangayElement.value = '<?=$row['brgy_name']?>';
    } catch (error) {
      console.error("Error fetching barangays: ", error);
      alert("No Internet connection.");
    }
  }

  // Initialize the fetching of provinces
  fetchProvinces();
</script>

