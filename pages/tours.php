<div class="container-fluid d-flex flex-column" style="height: 100%;">
    <h1 align='center' class="title" style="height: 50px;">HOTELS</h1>
    <div class="container-fluid d-flex" style="height: 40px;">
        <div class="mr-1" style="width: 200px;">
            <select id="countryHotelSelect" class="form-control text-center" name="countryHotelId">
                <option value="0" disabled selected>Select country</option>
                <?php
                $countries = getCountries();
                for ($i = 0; $i < count($countries); $i++) {
                    echo "<option value='" . $countries[$i]["id"] . "'>" . $countries[$i]["country"] . "</option>";
                }
                ?>
            </select>
        </div>
        <div id="divCityHotelSelect" class="ml-1 position-relative" style="width: 200px;">
            <?php
            for ($i = 0; $i < count($countries); $i++) {
                $cities = getCitiesByCountry($countries[$i]["id"]);
                echo "<select class='form-control text-center position-absolute' id='cityHotelSelect" . $countries[$i]["id"] . "' name='cityHotelId" . $countries[$i]["id"] . "'>";
                echo "<option value='0' disabled selected>Select city</option>";
                for ($j = 0; $j < count($cities); $j++) {
                    echo "<option value='" . $cities[$j]["id"] . "'>" . $cities[$j]["city"] . "</option>";
                }
                echo "</select>";
            }
            ?>
        </div>
    </div>

    <div class="container-fluid position-relative" id="HotelsList">
        <?php
        $countries = getCountries();
        for ($i = 0; $i < count($countries); $i++) {
            $cities = getCitiesByCountry($countries[$i]["id"]);
            for ($j = 0; $j < count($cities); $j++) {
        ?>
        <div class="container-fluid row hotelsDiv position-absolute"
            name='hotelsListSelector<?php echo $cities[$j]["id"] ?>'>
            <?php
                    $hotels = getHotelsByCity($cities[$j]["id"]);
                    if (count($hotels) > 0) {
                        for ($k = 0; $k < count($hotels); $k++) {
                            $image = getImagesByHotel($hotels[$k]["id"])[0];
                    ?>
            <div class='col-lg-4 col-md-6 col-sm-6 p-1'>
                <div class='hotelDiv divImage position-relative'
                    style='background-image:url(<?php echo $image["imagepath"] ?>)'>
                    <div class='hotelBackground hoverHotel text-center position-absolute'>
                        <a href="index.php?hotel=<?php echo $hotels[$k]["id"] ?>" class="hotelLink btn-link">
                            <h5 class="m-0 p-0">INFO</h5>
                        </a>
                    </div>
                    <div class='hotelBackground staticHotel position-absolute'>
                        <div class='d-flex flex-column justify-content-between' style="height: 100%;">
                            <?php echo "<h2>" . $hotels[$k]["hotel"] . "</h2>"; ?>
                            <div class='container-fluid d-flex justify-content-between p-0'>
                                <div class='d-flex'>
                                    <?php
                                                    for ($o = 0; $o < $hotels[$k]["stars"]; $o++) {
                                                        echo "&#11088;";
                                                    }
                                                    ?>
                                </div>
                                <?php echo "<h4>" . $hotels[$k]["cost"] . "$</h4>"; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <?php
                        }
                    }
                    ?>
        </div>

        <?php
            }
        } ?>

    </div>
</div>