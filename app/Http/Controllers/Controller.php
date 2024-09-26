<?php

namespace App\Http\Controllers;
/**
 * @OA\OpenApi(
 *   @OA\Info(
 *     title="ETGA API Listing",
 *     version="1.0.0",
 *     description="This is the List of APIs that should be used across ETGA and Tourguides ( Dashboard ETGA, Dashboard Tourguides, Website ETGA, Website Tourguides.me)",
 *     @OA\Contact(
 *       email="nada@technologies.ae"
 *     )
 *   ),
 *     @OA\PathItem(
 *       path="/items",
 *     ),
 * )
 *   @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT",
 *     description="JWT Authorization header using the Bearer scheme."
 *   )
 */

//  phpinfo();

abstract class Controller
{
    //
}
