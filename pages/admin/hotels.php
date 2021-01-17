<!-- Добавление/удаление отелей -->

<?php
if ($_POST["addHotel"]) {
    $countryId = $_POST["countryHotelId"];
    $citySelector = "cityHotelId" . strval($countryId);
    if (addHotel($_POST["hotel"], $countryId, $_POST[$citySelector], $_POST["stars"], $_POST["cost"], $_POST["info"])) {
        echo "<script>";
        echo "window.location=document.URL;";
        echo "</script>";
    } else {
        echo "<h3 align='center' style='color: red'>При добавлении возникла ошибка!</h3>";
    }
} else if ($_POST["deleteHotel"]) {
    if (deleteHotel($_POST["selectedHotels"])) {
        echo "<script>";
        echo "window.location=document.URL;";
        echo "</script>";
    } else {
        echo "<h3 align='center' style='color: red'>При удалении возникла ошибка!</h3>";
    }
} else {
?>


<form action="index.php?page=4" method="POST">
    <h3 align='center'>HOTELS</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class='py-1 px-1 col-1'>#</th>
                <th scope="col" class='py-1 px-1 col-3'>Hotel</th>
                <th scope="col" class='py-1 px-1 col-1'>&#9733;</th>
                <th scope="col" class='py-1 px-1 col-4'>Location</th>
                <th scope="col" class='py-1 px-1 col-2'>Cost</th>
                <th scope="col" class='py-1 px-1 col-1'></th>
            </tr>
        </thead>
        <tbody>
            <?php
                $hotels = getHotels();
                for ($i = 0; $i < count($hotels); $i++) {
                    echo "<tr>";
                    echo "<td class='py-1 px-1 col-1'>" . ($i + 1) . "</td>";
                    echo "<td class='py-1 px-1 col-3'>" . $hotels[$i]["hotel"] . "</td>";
                    echo "<td class='py-1 px-1 col-1'>" . $hotels[$i]["stars"] . "</td>";
                    echo "<td class='py-1 px-1 col-4'>" . getCountryById($hotels[$i]["countryId"])["country"] . " \\ " . getCityById($hotels[$i]["cityId"])["city"] . "</td>";
                    echo "<td class='py-1 px-1 col-2'>" . $hotels[$i]["cost"] . "$</td>";
                    echo "<td class='py-1 px-1 col-1'><input value='" . $hotels[$i]["id"] . "' type='checkbox' name='selectedHotels[]' class='checkboxHotel'></td>";
                    echo "</tr>";
                }
                ?>
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-7">
            <div class="d-flex flex-column container-fluid px-0 mt-2">
                <div class="container-fluid d-flex px-0">
                    <div class="mr-1" style="width: 50%;">
                        <select id="countryHotelSelect" class="form-control text-center" name="countryHotelId">
                            <option value="0" disabled selected>Country</option>
                            <?php
                                $countries = getCountries();
                                for ($i = 0; $i < count($countries); $i++) {
                                    echo "<option value='" . $countries[$i]["id"] . "'>" . $countries[$i]["country"] . "</option>";
                                }
                                ?>
                        </select>
                    </div>
                    <div id="divCityHotelSelect" class="ml-1 position-relative" style="width: 50%;">
                        <?php
                            for ($i = 0; $i < count($countries); $i++) {
                                $cities = getCitiesByCountry($countries[$i]["id"]);
                                echo "<select class='form-control text-center position-absolute' name='cityHotelId" . $countries[$i]["id"] . "'>";
                                echo "<option value='0' disabled selected>City</option>";
                                for ($j = 0; $j < count($cities); $j++) {
                                    echo "<option value='" . $cities[$j]["id"] . "'>" . $cities[$j]["city"] . "</option>";
                                }
                                echo "</select>";
                            }
                            ?>
                    </div>
                </div>

                <div class="container-fluid d-flex px-0">
                    <input type="text" class="form-control text-center mt-2" placeholder="Hotel" name="hotel"
                        style="flex: 2">

                    <input type="number" class="form-control text-center ml-1 mt-2" placeholder="Cost" name="cost"
                        style="flex: 1">
                    <select class="form-control text-center ml-1 mt-2" placeholder="Stars" name="stars" style="flex: 1">
                        <option value="0" disabled selected>Stars</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>

                <textarea class="container-fluid px-0 mt-2" placeholder="Description" name="info"></textarea>

                <div class="container-fluid px-0">
                    <input class="btn container-fluid" type="submit" value="Add" name="addHotel">
                </div>
            </div>
        </div>
        <div class="col-lg-5 d-flex flex-column justify-content-end mt-2">
            <input type="text" id="deleteHotelInfo" class="form-control text-center" value="Select hotels"
                style="color: orangered;" disabled>
            <input class="btn" type="submit" value="Delete" name="deleteHotel" id="deleteHotel" disabled>
        </div>
    </div>
</form>

<?php
}
?>