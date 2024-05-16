<main id="Projects">
    <div class="content">
        <div class="rectangleList">
            <h2>PROGETTI</h2>
			<div id="projectslist">
				<?php
                    foreach ($projects as $project) { ?>
						<div class="rectangle">
							<span class="rectangleTitle"><?php echo $project["title"];?></span>
							<div class="rectangleContent">
								<span class="rectangleDesc"><?php echo $project["description"];?></span>
								<button class="rectangleAction" id="<?php echo $project['id_project'];?>">
									<img src="assets/edit.svg" />
								</button>
							</div>
						</div>
                        <br>
                    <?php }
                ?>
			</div>
            <button class="rectangleAction" id="newProject">
                <img src="assets/apply.svg" />
            </button>
        </div>
    </div>
</main>

<div class="popup" id="newpopup">
    <div class="content">
        <div class="form">
            <h2>CREA NUOVO PROGETTO</h2>
            Titolo<input type="text" name="titolo" class="txtinput" /><br />
            Descrizione<textarea name="descrizione" class="txtinput"></textarea><br />
            <button class="button" id="btnNewPrj">crea</button>
        </div>
    </div>
</div>

<div class="popup" id="editpopup">
    <div class="content">
        <div class="form">
            <h2>MODIFICA PROGETTO</h2>
            <input type="hidden" name="id_project">
            Titolo<input type="text" name="titolo" class="txtinput" /><br />
            Descrizione<textarea name="descrizione" class="txtinput"></textarea><br />
            <button class="button" id="btnEditPrj">modifica</button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        let projects = <?php echo json_encode($projects); ?>;
        localStorage.setItem("projects", JSON.stringify(projects));
    });
</script>