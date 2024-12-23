<div class="row">
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
                    <th scope="row" class="font-4 display-14 color-black">Name</th>
                    <td class="font-4 display-14 color-black"> {{ Auth::user()->name }} </td>
                    <td class="font-4 display-16 color-blue">Edit</td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-14 color-black">Display Name</th>
                    <td class="font-4 display-14 color-black">
                        {{ Auth::user()->name }}

                    </td>
                    <td class="font-4 display-14 color-blue"> Edit </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-14 color-black">Email Address</th>
                    <td class="font-4 display-12 color-black">
                        {{ Auth::user()->email }} @if (Auth::user()->email_verified_at)
                            <span class="bg-success color-white px-3 mt-3 mt-md-0 py-md-1 rounded"> Verified </span>
                        @endif
                        <br>
                        <br>
                        This is email address you use to sign in. Its also where we send you booking confirmation
                    </td>
                    <td class="font-4 display-14 color-blue"> Edit </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-14 color-black">Phone number</th>
                    <td class="font-4 display-12 color-black">
                        {{ Auth::user()->contact }}
                        <br>
                        <br>
                        Properties or attraction you book will use this number if they need to contact you
                    </td>
                    <td class="font-4 display-14 color-blue"> Edit </td>
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
                    <th scope="row" class="font-4 display-14 color-black">Date of birth</th>
                    <td class="font-4 display-14 color-black"> Enter your date of birth </td>
                    <td class="font-4 display-16 color-blue">Edit</td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-14 color-black"> Nationality </th>
                    <td class="font-4 display-14 color-black">
                        Select the country/region you are from ?
                    </td>
                    <td class="font-4 display-14 color-blue"> Edit </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-14 color-black">Gender</th>
                    <td class="font-4 display-12 color-black">
                       Select your gender.
                    </td>
                    <td class="font-4 display-14 color-blue"> Edit </td>
                </tr>
                <tr class="custom-row-spacing">
                    <th scope="row" class="font-4 display-14 color-black">Address</th>
                    <td class="font-4 display-12 color-black">
                      Add your address
                    </td>
                    <td class="font-4 display-14 color-blue"> Edit </td>
                </tr>
            </tbody>
        </table>
        <div class="font-4 display-12 color-red d-flex justify-content-center align-items-start">
            <img src="{{ asset('assets/images/icons/delete-account.svg') }}" alt="delete" class="delete me-2" />
              Delete account
        </div>
    </div>
</div>
