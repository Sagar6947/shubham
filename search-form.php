<div class="primary-sidebar-inner box-shadow radius-5">
    <div class="card border-0 mb-4">
        <div class="card-body">
            <form action="all-property.php" method="POST">
                <!-- Find New Property -->
                <h5 class="mb-3">Search Property</h5>

                <div class="form-group">
                    <label>Select Property type</label>
                    <div class="input-with-icon">
                        <select class="form-control form-control-lg " name="property_type">
                            <option value="">Select Property type</option>
                            <?php
                            $type = mysqli_query($con, "SELECT * FROM `tbl_property_type`");
                            while ($ptype = mysqli_fetch_array($type)) {
                            ?>
                                <option value="<?= $ptype['type_id'] ?>"><?= $ptype['type'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <i class="ti-search"></i>
                    </div>
                </div>


                <div class="row ">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <label>Select Property value range</label>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input type="number" name="minimum" class="form-control form-control-lg " placeholder="Minimum">
                                <i class="ti-money"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="form-group">
                            <div class="input-with-icon">
                                <input type="number" name="maximum" class="form-control form-control-lg  " placeholder="Maximum">
                                <i class="ti-money"></i>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group">
                    <label>Select Area</label>

                    <select name="area" id="area" class="form-control form-control-lg">

                        <option value="">Select Area</option>
                        <?php
                        $loc = mysqli_query($con, "SELECT * FROM `tbl_areas` ORDER BY area ASC");
                        while ($city = mysqli_fetch_array($loc)) {
                        ?>

                            <option value="<?= $city['area']; ?>"><?= $city['area']; ?></option>
                        <?php
                        }
                        ?>


                    </select>

                </div>



                <div class="form-group">

                    <label>Property for</label>

                    <select name="transaction_type" class="form-control form-control-lg "="">
                        <option value="">Rent/ Sale</option>
                        <option value="Rent">For Rent</option>
                        <option value="Sale">For Sale</option>

                    </select>

                </div>



                <button type="submit" name="propertysearch" class="btn btn-primary  btn-block">Find Property</button>


            </form>
        </div>
    </div>


</div>
</div>