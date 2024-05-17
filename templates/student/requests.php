<main id="Requests">
    <div class="content">
        <div class="rectangleList">
            <h2>RICHIESTE DI PCTO</h2>
            <?php
                foreach ($requests as $request) {
                    ?>
                    <div class="rectangle">
                        <span><a href="" style="color: white;" id="<?php echo $request["id_business"]; ?>"><?php echo $request["name"]; ?></a></span>
                        <div class="rectangleContent">
                            <span class="rectangleDesc"><?php echo $request["title"] ?></span>
                            <span class="rectangleSubtitle"><?php echo $request["accepted"] == "" ? "Pending" : ($request["accepted_bool"] == "true" ? "Accepted" : "Refused") ?></span>
                        </div>
                    </div>
                <?php }
            ?>
        </div>
    </div>
</main>