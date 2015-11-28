<?php
include_once '../session.php';
include_once '../config.php';

startSession();
// If is user dont login - go to logoin page
if (!isset($_SESSION['login_user'])) exit(header('location: ../login.php'));
if (isset($_POST['update'])) {
    $id_user = (int)$_POST['update'];
    $sql = "SELECT * FROM repair_invoice;";
    $res = $mysqli->query($sql);

    $res->close();
    if ($mysqli) $mysqli->close();
}

?>

<div class="modal" id="formRepairInvoice" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <form class="form-horizontal novalidate" name="myForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Repair invoice: <?php $id_user ?></h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-5">
                            <p>Date in: 2015-10-26 09:27:23 </p>
                        </div>
                        <div class="col-sm-6">
                            <p>User: Малахов</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm ">
                                <label class="control-label col-sm-2">Client:</label>

                                <div class="col-sm-10" id="device">
                                    <input class="form-control" type="text" required/>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm ">
                                <label class="control-label col-sm-2">Phone:</label>

                                <div class="col-sm-10" id="serialnumber">
                                    <input class="form-control" type="text"/>
                                </div>
                            </div>

                        </div>

                    </div><div class="row">
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm ">
                                <label class="control-label col-sm-2">Device:</label>

                                <div class="col-sm-10" id="device">
                                    <input class="form-control" type="text" required/>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-group-sm ">
                                <label class="control-label col-sm-2">S/N:</label>

                                <div class="col-sm-10" id="serialnumber">
                                    <input class="form-control" type="text"/>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-sm ">
                                <label class="control-label col-sm-1">Defect:</label>

                                <div class="col-sm-11" id="device">
                                    <input class="form-control" type="text" required/>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group form-group-sm ">
                                <label class="control-label col-sm-1">Result:</label>

                                <div class="col-sm-11" id="device">
                                    <input class="form-control" type="text" required/>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-sm-1">
                           Ready
                        </div>
                        <div class="col-sm-7">
                                <label checkbox-inline>
                                    <input type="checkbox"> Date: 2015-10-26 09:27:23 | user: qwant
                                </label>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group form-group-sm ">
                                <label class="control-label col-sm-5">Price(uah):</label>

                                <div class="col-sm-7" id="device">
                                    <input class="form-control" type="text" required/>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-1">
                            Issue
                        </div>
                        <div class="col-sm-7">
                            <label checkbox-inline>
                                <input type="checkbox"> Date: 2015-10-26 09:27:23 | user: qwant
                            </label>
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" id="submit" value="Save"/>
                    <button type="reset" class="btn btn-default" data="modal">Cancel</button>
                </div>
            </form>
        </div>

    </div>
</div>
<!-- end modal form -->