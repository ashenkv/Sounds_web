<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Invoice | SoundS</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.css" integrity="sha512-KXol4x3sVoO+8ZsWPFI/r5KBVB/ssCGB5tsv2nVOKwLg33wTFP3fmnXa47FdSVIshVTgsYk/1734xSk9aFIa4A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>

<body class="mt-0" style="background-color: #f7f7ff;">

    <div class="container-fluid">
        <div class="row">

        <?php include "navHome.php";

require "connection.php";

if (isset($_SESSION["u"])) {
    $umail = $_SESSION["u"]["email"];
    $oid = $_GET["id"];
?>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-2 ui buttons justify-content-end">
                    <button class="ui button rounded-4 me-2" onclick="printInvoice();"><i class="bi bi-printer-fill"></i></button>
                    <div class="or"></div>
                    <button class="ui button secondary rounded-4 me-2" onclick="printInvoice();"><i class="bi bi-filetype-pdf"></i> PDF</button>
                </div>

                <div class="col-12">
                    <hr />
                </div>

                <div class="col-12" id="page">
                    <div class="row">

                        <div class="col-6">
                            <div class="ms-5 invoiceHeaderImage"></div>
                        </div>

                        <div class="col-5">
                            <div class="row">
                                <div class="col-12 text-dark text-end text-decoration-underline">
                                    <h2>SoundS</h2>
                                </div>
                                <div class="col-12 fw-bold text-end text-secondary">
                                    <span>Katana, Negombo, Sri Lanka</span><br />
                                    <span>+94 112 785 694</span><br />
                                    <span>sounds@gmail.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-1"></div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-10 offset-1 mb-4 shadow">
                            <div class="row">
                                <div class="col-6 text-secondary">
                                    <h5 class="fw-bold">INVOICE TO :</h5>
                                    <?php
                                    $address_rs = Database::search("SELECT * FROM `user_has_address` WHERE `user_email`='" . $umail . "'");
                                    $address_data = $address_rs->fetch_assoc();
                                    ?>
                                    
                                    <h2><?php echo $_SESSION["u"]["fname"] . " " . $_SESSION["u"]["lname"]; ?></h2>
                                    <span><?php echo $address_data["line1"] . ", " . $address_data["line2"]; ?></span><br />
                                    <span><?php echo $umail; ?></span>
                                </div>
                                <?php
                                $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $oid . "'");
                                $invoice_num = $invoice_rs->num_rows;
                                $invoice_data = $invoice_rs->fetch_assoc();

                                ?>
                                <div class="col-6 text-end mt-4">
                                    <h1 class="text-secondary">INVOICE 0<?php echo $oid; ?></h1>
                                    <span class="fw-bold">Date & Time of Invoice : </span><br />
                                    <span><?php echo $invoice_data["date"]; ?></span>
                                </div>
                                <!-- <div class="col-6 text-end mt-4 text-secondary">
                                    <h1 class=" fs-3">INVOICE 001</h1>
                                    <span class="fw-bold">Date & Time of Invoice : </span><br />
                                    <span>2023-03-03</span>
                                </div> -->
                            </div>
                        </div>

                        <div class="col-10 offset-1 shadow">
                            <table class="table ">

                                <thead>
                                    <tr class="border border-1 border-secondary">
                                        <th>#</th>
                                        <th>Oreder ID & Product</th>
                                        <th class="text-end">Unit Price</th>
                                        <th class="text-end">Quantity</th>
                                        <th class="text-end">Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="height: 72px;">
                                        <td class="text-white fs-3"><?php echo $invoice_data["id"]; ?></td>
                                        <!-- <td class="bg-dark text-white fs-3">1</td> -->
                                        <td class="bg-light">
                                            <span class="fw-bold text-secondary text-decoration-underline p-2"><?php echo $oid ?></span><br />
                                            <!-- <span class=" text-secondary text-decoration-underline p-2">001</span><br /> -->
                                            <?php
                                            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $invoice_data["product_id"] . "'");
                                            $product_data = $product_rs->fetch_assoc();
                                            ?>
                                            <span class="fw-bold text-dark fs-4 p-2"><?php echo $product_data["title"]; ?></span>
                                            <!-- <span class="fw-bold text-dark fs-4 p-2">apple airpod 3rd gen</span> -->
                                        </td>
                                        <td class="fw-bold fs-6 text-end pt-4 bgh2 text-white">Rs. <?php echo $product_data["price"]; ?> .00</td>
                                        <td class="fw-bold fs-6 text-end pt-4"><?php echo $invoice_data["qty"]; ?></td>
                                        <td class="fw-bold fs-6 text-end pt-4 bgh2 text-white">Rs. <?php echo $invoice_data["total"]; ?> .00</td>
                                        <!-- <td class=" fs-6 text-end pt-4 bg-dark text-white">Rs. 29999 .00</td>
                                        <td class=" fs-6 text-end pt-4">1</td>
                                        <td class=" fs-6 text-end pt-4 bg-dark text-white">Rs. 30399 .00</td> -->
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <?php
                                    $city_rs = Database::search("SELECT * FROM `city` WHERE `id`='" . $address_data["city_id"] . "'");
                                    $city_data = $city_rs->fetch_assoc();

                                    $delivery = 0;
                                    if ($city_data["district_id"] == 5) {
                                        $delivery = $product_data["delivery_fee_colombo"];
                                    } else {
                                        $delivery = $product_data["delivery_fee_other"];
                                    }
                                    $t = $invoice_data["total"];
                                    $g = $t - $delivery;
                                    ?>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold">SUBTOTAL</td>
                                        <td class="text-end">Rs. <?php echo $g; ?> .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold border-dark">Delivery Fee</td>
                                        <td class="text-end border-dark">Rs. <?php echo $delivery; ?> .00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="3" class="border-0"></td>
                                        <td class="fs-5 text-end fw-bold border-dark tclr fs-3">GRAND TOTAL</td>
                                        <td class="text-end border-dark tclr fs-3">Rs. <?php echo $t; ?> .00</td>
                                    </tr>
                                </tfoot>

                            </table>
                        </div>

                        <div class="col-12 border-start border-5 border-warning mt-3 mb-3 rounded" style="background-color: #e7f2ff;">
                            <div class="row">
                                <div class="col-12 mt-3 mb-3">
                                    <label class="form-label fw-bold fs-5">NOTICE : </label><br />
                                    <label class="form-label fs-6">Purchased items can return befor 7 days of Delivery.</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <hr class="border border-1 border-primary" />
                        </div>

                        <div class="col-12 text-center mb-3">
                            <label class="form-label fs-5 text-black-50 fw-bold">
                                valid without the Signature and Seal.
                            </label>
                        </div>

                    </div>
                </div>

            <?php
            }
            ?>

            <?php include "footer.php"; ?>

        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.5.0/semantic.min.js" integrity="sha512-Xo0Jh8MsOn72LGV8kU5LsclG7SUzJsWGhXbWcYs2MAmChkQzwiW/yTQwdJ8w6UA9C6EVG18GHb/TrYpYCjyAQw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>