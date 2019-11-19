<?php /*HELP: */

use Models\Iscrizione;
use Models\Personaggio;

$pgs = Personaggio::all();
?>

<div class="pagina_gestione_hogwarts">


    <!-- Titolo della pagina -->
    <div class="page_title">
        <h2><?php echo gdrcd_filter('out', $MESSAGE['interface']['administration']['hogwarts']['page_name'] = 'Gestione Hogwarts'); ?></h2>
    </div>

    <?php
    if($_POST['op'] == 'iscrivi') {
        $pg = Personaggio::query()->find($_POST['pg']);
        if($pg->iscrizione()->first()) {
            $iscrizione = $pg->iscrizione()->first();
        }
        else {
            $iscrizione = new Iscrizione();
        }

        $iscrizione['personaggio_id'] = $pg['id'];
        $iscrizione['casata'] = $_POST['casata'];
        $iscrizione['anno'] = $_POST['anno'];
        $iscrizione['ruolo'] = $_POST['ruolo'];
        $iscrizione->save();

        echo "<div> Iscrizione compiuta </div>";
    }

    if($_POST['op'] == 'rimuovi') {
        $pg = Personaggio::query()->find($_POST['pg']);
        if($pg->iscrizione()->first()) {
            $pg->iscrizione()->delete();
        }

        echo "<div> Studente rimosso </div>";
    }
    ?>

    <!-- Box principale -->
    <div class="page_body">
            <div class="form_gioco">
                <div class="form_label">
                    <?php echo $MESSAGE['interface']['administration']['hogwarts']['promozione'] ?>
                </div>
                <form action="main.php?page=gestione_hogwarts"
                      method="post">
                    <input type="hidden"
                           name="op"
                           value="iscrivi" />
                    <label for="pg">Personaggio</label>
                    <br>
                    <select name="pg">
                        <?php
                            foreach($pgs as $pg) {
                                ?>
                                    <option value="<?=$pg['id']?>">
                                        <?=$pg['nome']?>
                                    </option>
                                <?php
                            }
                        ?>
                    </select>
                    <br>
                    <label for="anno">Anno</label>
                    <br>
                    <select name="anno">
                        <?php
                            foreach(range(1,7) as $anno) {
                                ?>
                                    <option value="<?=$anno?>">
                                        <?=$anno?>
                                    </option>
                                <?php
                            }
                        ?>
                    </select>
                    <br>
                    <label for="casata">Casata</label>
                    <br>
                    <select name="casata">
                        <option value="gryffindor">Gryffindor</option>
                        <option value="slytherin">Slytherin</option>
                        <option value="ravenclaw">Ravenclaw</option>
                        <option value="hufflepuff">Hufflepuff</option>
                    </select>
                    <br>
                    <label for="ruolo">Ruolo</label>
                    <br>
                    <select name="ruolo">
                        <option value="studente">Studente</option>
                        <option value="prefetto">Prefetto</option>
                        <option value="caposcuola">Caposcuola</option>
                    </select>
                    <br>
                    <button type="submit">Assegna</button>
                </form>

                <div class="form_label">
                    <?php echo $MESSAGE['interface']['administration']['hogwarts']['rimuovi'] ?>
                </div>
                <form action="main.php?page=gestione_hogwarts"
                      method="post">
                    <input type="hidden"
                           name="op"
                           value="rimuovi" />
                    <label for="pg">Personaggio</label>
                    <br>
                    <select name="pg">
                        <?php
                        foreach(Personaggio::has("iscrizione")->get() as $pg) {
                            ?>
                            <option value="<?=$pg['id']?>">
                                <?=$pg['nome']?>
                            </option>
                            <?php
                        }
                        ?>
                    </select>
                    <br>
                    <button type="submit">Rimuovi</button>
                </form>
            </div>
    </div>


</div><!-- Box principale -->