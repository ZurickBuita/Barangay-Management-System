function deleteFunction(btn, url) {
	document.addEventListener("click", (event)=> {

		if (event.target.matches('button[data-target="' + btn + '"]')) {
			 // Retrieve the data-id attribute from the clicked button
          const dataId = event.target.getAttribute("data-id");
  
			Swal.fire({
			  title: "Are you sure?",
			  text: "You won't be able to revert this!",
			  icon: "warning",
			  showCancelButton: true,
			  confirmButtonColor: "#3085d6",
			  cancelButtonColor: "#d33",
			  confirmButtonText: "Yes, delete it!"
			}).then((result) => {
			  if (result.isConfirmed) {

			  	fetch(url + dataId, {
			  		method: 'DELETE',
			  	})
			  	.then((response)=> {
			  		if(!response.ok) throw new Error("Network response not ok");
			  		return response.json();
			  	})
			  	.then((data)=> {
			  		Swal.fire({
				      title: "Deleted!",
				      text: data.message,
				      icon: data.status,
				      toast: true,
				      position: "top-end",
				      timer: 2000,
				      timerProgressBar: true,
				      showConfirmButton: false,
				      didClose: ()=> {
				      	location.reload();
				      }
				    });
			  	})
			  	.catch(()=> {
			  		 Swal.fire(
                  'Error!',
                  'An error occurred while deleting the item.',
                  'error'
              );
			  	});
			  }
			});
		}
	});
}

// Delete Official
deleteFunction("#deleteOfficial", "model/Officials/DeleteOfficial.php?id=");
// Delete Business Clearance
deleteFunction("#deleteBusinessClearance", "model/Business Clearance/DeleteBusinessClearance.php?id=");
// Delete Position
deleteFunction("#deletePosition", "model/Position/DeletePosition.php?id=");
// Delete Chairmanship
deleteFunction("#deleteChairmanship", "model/Chairmanship/DeleteChairmanship.php?id=");
// Delete Position
deleteFunction("#deleteUser", "model/Users/DeleteUser.php?id=");
// Delete Purok
deleteFunction("#deletePurok", "model/Purok/DeletePurok.php?id=");
// Delete Official Term
deleteFunction("#deleteTerm", "model/OfficialTerm/DeleteOfficialTerm.php?id=");
// Delete Resident
deleteFunction("#deleteResident", "model/Resident/DeleteResident.php?id=");
// Delete Blotter
deleteFunction("#deleteBlotter", "model/Blotter/DeleteBlotter.php?id=");

// Initialize reusable function for add form
function addFunction(formId, action, modal) {
  const form = document.getElementById(formId);
  
  // Check if the form exists
  if (!form) {
    console.warn(`Form with id "${formId}" not found.`);
    return;
  }

  // Prevent adding multiple event listeners
  if (form.dataset.listenerAdded === "true") {
    return;
  }
  form.dataset.listenerAdded = "true";

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    const formData = new FormData(this); // Create a FormData object from the form

    fetch(action, { 
      method: 'POST',
      body: formData
    })
    .then(response => response.json()) // Parse the JSON response
    .then(data => {
      if (data.status === "error") {
        // Use Object.entries to iterate over the errors object
        Object.entries(data.errors).forEach(([key, value]) => {
          const errorElement = document.getElementById(key + "_add_error");
          if (errorElement) {
            errorElement.innerHTML = value;
          }
        });
      } else if (data.status === "success") {
        // Close the modal if success
        const purokModal = document.getElementById(modal);
        if (purokModal) {
          purokModal.classList.remove("show");
          purokModal.style.display = "none";
        }
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
          backdrop.parentNode.removeChild(backdrop);
        }
        // Sweet alert Toast
        Swal.fire({
          title: "Success!",
          text: data.message,
          icon: "success",
          toast: true,
          position: "top-end",
          timer: 2000,
          timerProgressBar: true,
          showConfirmButton: false,
          didClose: () => {
            location.reload();
          }
        });
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while adding.');
    });
  });
}

// Add Purok
addFunction("addPurokForm", "model/Purok/CreatePurok.php", "addPurok");
// Add Position
addFunction("addPositionForm", "model/Position/CreatePosition.php", "addPosition");
// Add Chairmanship
addFunction("addChairmanshipForm", "model/Chairmanship/CreateChairmanship.php", "addChairmanship");
// Add Official Term
addFunction("addOfficialTermForm", "model/OfficialTerm/CreateOfficialTerm.php", "addTerm");
// Add User
addFunction("addUserForm", "model/Users/AddUser.php", "addUser");
// Add Official
addFunction("addOfficialForm", "model/Officials/CreateOfficial.php", "addOfficial");
// Add Business Clearance
addFunction("addBusinessClearanceForm", "model/Business Clearance/AddBusinessClearance.php", "addBusinessClearance");
// Add Blotter
addFunction("addBlotterForm", "model/Blotter/CreateBlotter.php", "addBlotter");
// Add resident
addFunction("addResidentForm", "model/Resident/CreateResident.php", "addResident");

// Initialize reusable function for edit form
function editFunction(formId, action, modal) {
  const form = document.getElementById(formId);
  
  // Check if the form exists
  if (!form) {
    console.warn(`Form with id "${formId}" not found.`);
    return;
  }

  // Prevent adding multiple event listeners
  if (form.dataset.listenerAdded === "true") {
    return;
  }
  form.dataset.listenerAdded = "true";

  form.addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission
    const formData = new FormData(this); // Create a FormData object from the form

    fetch(action, { 
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (!response.ok) throw new Error('Network response was not ok');
      return response.json(); // Parse the JSON response
    })
    .then(data => {
      if (data.status === "error") {
        // Use Object.entries to iterate over the errors object
        Object.entries(data.errors).forEach(([key, value]) => {
          const errorElement = document.getElementById(key + "_edit_error");
          if (errorElement) {
            errorElement.innerHTML = value;
          }
        });
      } else if (data.status === "success") {
        // Close the modal if success
        const purokModal = document.getElementById(modal);
        if (purokModal) {
          purokModal.classList.remove("show");
          purokModal.style.display = "none";
        }
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) {
          backdrop.parentNode.removeChild(backdrop);
        }
        // Sweet alert Toast
        Swal.fire({
          title: "Success!",
          text: data.message,
          icon: "success",
          toast: true,
          position: "top-end",
          timer: 2000,
          timerProgressBar: true,
          showConfirmButton: false,
          didClose: () => {
            location.reload();
          }
        });
      }
    })
    .catch(error => {
      console.error('Error:', error);
      alert('An error occurred while editing.');
    });
  });
}

// Edit Purok
editFunction("editPurokForm", "model/Purok/EditPurok.php", "editPurok");
// Edit Position
editFunction("editPositionForm", "model/Position/EditPosition.php", "editPosition");
// Edit Chairmanship
editFunction("editChairmanshipForm", "model/Chairmanship/EditChairmanship.php", "editChairmanship");
// Edit Official Term
editFunction("editOfficialTermForm", "model/OfficialTerm/EditOfficialTerm.php", "editTerm");
// Edit User
editFunction("editUserForm", "model/Users/editUser.php", "editUser");
// Edit Barangay Information
editFunction("editBarangayInfoForm", "model/EditBarangayInfo.php", "editBarangayInfo");
// Edit Official
editFunction("editOfficialForm", "model/Officials/EditOfficial.php", "editOfficial");
// Edit Business Clearance
editFunction("editBusinessClearanceForm", "model/Business Clearance/EditBusinessClearance.php", "editBusinessClearance");
// Edit Blotter
editFunction("editBlotterForm", "model/Blotter/EditBlotter.php", "editBlotter");
// Edit resident
editFunction("editResidentForm", "model/Resident/EditResident.php", "editResident");

// Display position data in edit
function viewPosition(that) {
	const id = that.getAttribute("data-id");
	const position = that.getAttribute("data-position");
	const order = that.getAttribute("data-order");
	
	document.getElementById("id").value = id;
	document.getElementById("position").value = position;
	document.getElementById("order").value = order;
}

// Display Chairmanship data in edit
function viewChairmanship(that) {
	const id = that.getAttribute("data-id");
	const title = that.getAttribute("data-title");

	document.getElementById("id").value = id;
	document.getElementById("title").value = title;
}

// Display Purok data in edit
function viewPurok(that) {
	const id = that.getAttribute("data-id");
	const name = that.getAttribute("data-name");
	const details = that.getAttribute("data-details");

	document.getElementById("id").value = id;
	document.getElementById("purok").value = name;
	document.getElementById("details").value = details;
}

// Display Official Term in edit
function viewOfficialTerm(that) {
	const id = that.getAttribute("data-id");
	const start_term = that.getAttribute("data-start_term");
	const end_term = that.getAttribute("data-end_term");

	document.getElementById("id").value = id;
	document.getElementById("start_term").value = start_term;
	document.getElementById("end_term").value = end_term;
}

// Display Blotter in edit
function viewBlotter(that) {
	const id = that.getAttribute("data-id");
	const complainant = that.getAttribute("data-complainant");
	const respondent = that.getAttribute("data-respondent");
	const victim = that.getAttribute("data-victim");
	const status = that.getAttribute("data-status");
	const type = that.getAttribute("data-type");
	const date = that.getAttribute("data-date");
	const time = that.getAttribute("data-time");
	const location = that.getAttribute("data-location");
	const details = that.getAttribute("data-details");

	document.getElementById("id").value = id;
	document.getElementById("complainant").value = complainant;
	document.getElementById("respondent").value = respondent;
	document.getElementById("victim").value = victim;
	document.getElementById("status").value = status;
	document.getElementById("type").innerHTML = type;
	document.getElementById("details").innerHTML = details;
	document.getElementById("date").value = date;
	document.getElementById("time").value = time;
	document.getElementById("location").value = location;
}

function viewPermit(that) {
	const id = that.getAttribute("data-id");
	const owner = that.getAttribute("data-owner");
	const name = that.getAttribute("data-name");
	const nature = that.getAttribute("data-nature");
	const applied = that.getAttribute("data-applied");

	document.getElementById("id").value = id;
	document.getElementById("business_name").value = name;
	document.getElementById("business_owner").value = owner;
	document.getElementById("business_nature").value = nature;
	document.getElementById("date_applied").value = applied;
}

function viewResident(that) {
	const id = that.getAttribute("data-id");
	const national_id = that.getAttribute("data-national_id");
	const citizenship = that.getAttribute("data-citizenship");
	const firstname = that.getAttribute("data-firstname");
	const middlename = that.getAttribute("data-middlename");
	const lastname = that.getAttribute("data-lastname");
	const birthdate = that.getAttribute("data-birthdate");
	const age = that.getAttribute("data-age");
	const civilstatus = that.getAttribute("data-civilstatus");
	const sex = that.getAttribute("data-sex");
	const is_voter = that.getAttribute("data-is_voter");
	const email = that.getAttribute("data-email");
	const occupation = that.getAttribute("data-occupation");
	const address = that.getAttribute("data-address");
	const is_deceased = that.getAttribute("data-is_deceased");
	const purok_id = that.getAttribute("data-purok_id");
	const is_indigenous = that.getAttribute("data-is_indigenous");
	const salary = that.getAttribute("data-salary");
	
	document.getElementById('id').value = id;
	document.getElementById('firstname').value = firstname;
	document.getElementById('middlename').value = middlename;
	document.getElementById('lastname').value = lastname;
	document.getElementById('birthday').value = birthdate;
	document.getElementById('age').value = age;
	document.getElementById('email').value = email;
	document.getElementById('address').value = address;
	document.getElementById('national_id').value = national_id;
	document.getElementById('citizenship').value = citizenship;
	document.getElementById('occupation').value = occupation;
	document.getElementById('salary').value = salary;
	document.getElementById('sex').value = sex;
	document.getElementById('civilstatus').value = civilstatus;
	document.getElementById('is_indigenous').value = is_indigenous;
	document.getElementById('is_deceased').value = is_deceased;
	document.getElementById('is_voter').value = is_voter;
	document.getElementById('purok_id').value = purok_id;
}

function viewOfficial(that) {
	const id = that.getAttribute("data-id");
	const chairmanship = that.getAttribute("data-chairmanship_id");
	const position = that.getAttribute('data-position_id');
	const term = that.getAttribute('data-term_id');
	const resident = that.getAttribute('data-resident_id');
	const status = that.getAttribute("data-status");

	document.getElementById('id').value = id;
	document.getElementById('chairmanship_id').value = chairmanship;
	document.getElementById('position_id').value = position;
	document.getElementById('residents_id').value = resident;
	document.getElementById('term_id').value = term;
	document.getElementById("status").value = status;
}

// Multiple delete
function toggleCheckBox(that) {
		const checkboxes = document.querySelectorAll("input[type='checkbox'][name='delete_id']");
		checkboxes.forEach(checkbox => {
			if(that.checked) {
				checkbox.checked = true;
			} else {
				checkbox.checked = false;
			}
		});
}
