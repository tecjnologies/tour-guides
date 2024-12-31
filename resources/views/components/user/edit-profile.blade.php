{{-- <div class="row">
    <div class="col-md-12">
        <div class="spacer mt-4"></div>
        <h3 class="font-2 display-30"> Personal Details </h3>
        <p class="font-4 display-16"> Update your info and find out how it's used. </p>
    </div>
    <div class="col-md-6 pe-md-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-12 color-black">Name</th>
                    <td class="font-4 display-12 color-black"> {{ Auth::user()->name }} </td>
                    <td class="font-4 display-16 color-blue">Edit</td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-12 color-black">Display Name</th>
                    <td class="font-4 display-12 color-black">
                        {{ Auth::user()->name }}

                    </td>
                    <td class="font-4 display-12 color-blue"> Edit </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-12 color-black">Email Address</th>
                    <td class="font-4 display-12 color-black">
                        {{ Auth::user()->email }} @if (Auth::user()->email_verified_at)
                            <span class="bg-success color-white px-3 mt-3 mt-md-0 py-md-1 rounded"> Verified </span>
                        @endif
                        <br>
                        <br>
                        This is email address you use to sign in. Its also where we send you booking confirmation
                    </td>
                    <td class="font-4 display-12 color-blue"> Edit </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-12 color-black">Phone number</th>
                    <td class="font-4 display-12 color-black">
                        {{ Auth::user()->contact }}
                        <br>
                        <br>
                        Properties or attraction you book will use this number if they need to contact you
                    </td>
                    <td class="font-4 display-12 color-blue"> Edit </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6 ps-md-5">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-12 color-black">Date of birth</th>
                    <td class="font-4 display-12 color-black"> Enter your date of birth </td>
                    <td class="font-4 display-16 color-blue">Edit</td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-12 color-black"> Nationality </th>
                    <td class="font-4 display-12 color-black">
                        Select the country/region you are from ?
                    </td>
                    <td class="font-4 display-12 color-blue"> Edit </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-12 color-black">Gender</th>
                    <td class="font-4 display-12 color-black">
                        Select your gender.
                    </td>
                    <td class="font-4 display-12 color-blue"> Edit </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-12 color-black">Address</th>
                    <td class="font-4 display-12 color-black">
                        Add your address
                    </td>
                    <td class="font-4 display-12 color-blue"> Edit </td>
                </tr>
            </tbody>
        </table>
        <div class="font-4 display-12 color-red d-flex justify-content-center align-items-start">
            <img src="{{ asset('assets/images/icons/delete-account.svg') }}" alt="delete" class="delete me-2" />
            Delete account
        </div>
    </div>
</div> --}}


<style>
    .form-control:disabled {
     
    }
    .form-control:disabled, table select {
    opacity: 1;
    font-size: 13px;
    font-family: "Lexend-Regular";
    border: unset;
    background-color: unset;
    }

</style>

<div class="row">
    <div class="col-md-12">
        <div class="spacer mt-4"></div>
        <h3 class="font-2 display-30">Personal Details</h3>
        <p class="font-4 display-16">Update your info and find out how it's used.</p>
    </div>
    <div class="col-md-6 pe-md-5">
        <table class="table">
            <tbody>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-5 display-12 color-black">Name</th>
                    <td>
                        <input type="text" id="name" class="form-control" value="{{ Auth::user()->name }}"
                            disabled />
                    </td>
                    <td>
                        <button class="btn btn-link text-primary" onclick="toggleEdit('name', this)">Edit</button>
                    </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-5 display-12 color-black"> Display Name </th>
                    <td>
                        <input type="text" id="username" class="form-control" value="{{ Auth::user()->username }}"
                            disabled />
                    </td>
                    <td>
                        <button class="btn btn-link text-primary" onclick="toggleEdit('username', this)">Edit</button>
                    </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-5 display-12 color-black">Email Address</th>
                    <td>
                        <input type="email" id="email" class="form-control" value="{{ Auth::user()->email }}"
                            disabled />
                    </td>
                    <td>
                        <button class="btn btn-link text-primary" onclick="toggleEdit('email', this)">Edit</button>
                    </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-5 display-12 color-black">Phone Number</th>
                    <td>
                        <input type="text" id="contact" class="form-control" value="{{ Auth::user()->contact }}"
                            disabled />
                    </td>
                    <td>
                        <button class="btn btn-link text-primary" onclick="toggleEdit('contact', this)">Edit</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="font-4 display-12 color-red d-flex justify-content-center align-items-start">
            <form action="{{ route('user.profile.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.')">
                @csrf
                @method('DELETE')
                <button type="submit" class="d-flex justify-content-start align-items-center"> 
                    <img src="https://stage.tourguides.me/assets/images/icons/delete-account.svg" alt="delete"
                    class="delete me-2">
                    Delete account 
                </button>  
            </form>
        </div>
    </div>

    <div class="col-md-6 pe-md-5">
        <table class="table">
            <tbody>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-5 display-12 color-black">Date of Birth</th>
                    <td>
                        <input type="text" id="date_of_birth" class="form-control"
                            value="{{ Auth::user()->date_of_birth }}" disabled />
                    </td>
                    <td>
                        <button class="btn btn-link text-primary"
                            onclick="toggleEdit('date_of_birth', this)">Edit</button>
                    </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-5 display-12 color-black"> Nationality </th>
                    <td>
                        <input type="text" id="nationality" class="form-control"
                            value="{{ Auth::user()->nationality }}" disabled />
                    </td>
                    <td>
                        <button class="btn btn-link text-primary"
                            onclick="toggleEdit('nationality', this)">Edit</button>
                    </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-5 display-12 color-black">Gender</th>
                    <td>
                        <select name="gender" id="gender" class="w-full p-3" disabled>
                            <option value="male" class="font-4 display-16 color-blue" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                            <option value="female" class="font-4 display-16 color-blue" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-link text-primary" onclick="toggleEdit('gender', this)">Edit</button>
                    </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-5 display-12 color-black"> Address </th>
                    <td>
                        <input type="text" id="address" class="form-control" value="{{ Auth::user()->address }}"
                            disabled />
                    </td>
                    <td>
                        <button class="btn btn-link text-primary" onclick="toggleEdit('address', this)">Edit</button>
                    </td>
                </tr>


            </tbody>
        </table>
    </div>
</div>

<script>
    function toggleEdit(fieldId, button) {

        const updateProfileUrl = "{{ route('user.profile.update') }}";
        const inputField = document.getElementById(fieldId);

        if (inputField.disabled) {
            inputField.disabled = false;
            inputField.focus();
            button.innerText = 'Save';
        } else {
            inputField.disabled = true;
            button.innerText = 'Edit';
           
            const updatedValue = inputField.value;
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content'); 

            $.ajax({
                url: updateProfileUrl,
                type: 'POST',
                data: {
                    field: fieldId,
                    value: updatedValue,
                    _token: csrfToken,
                },
                success: function(response) {
                    console.log('Update successful:', response);
                    alert('Updated successfully!');
                    inputField.disabled = true;
                    button.innerText = 'Edit';
                },
                error: function(xhr, status, error) {
                    console.error('Update failed:', error);
                    alert('Failed to update. Please try again.');
                },
            });

        }


    }
</script>
