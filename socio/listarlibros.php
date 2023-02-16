<?php
                include("../conexion.php");

                $query="SELECT * FROM libro";
                $resultado=$conex->query($query);
                while($row = $resultado->fetch_assoc()){
                ?>
                    <?php echo "<article>"; ?>
                    <?php echo "<header>"; ?>
                    <?php echo "{$row['id']}. "; ?>
                    <?php echo $row['titulo']; ?>
                    <?php echo " - {$row['autor']}"; ?> <br/>
                    <?php echo "</header>"; ?>
                    <div class="lima">
                    <img style="filter: drop-shadow(0 0 7px rgb(2, 2, 27))" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>"/><br/></div>
                    <?php echo "<section>"; ?>
                    <?php echo "</section>"; ?>                    
                    <?php echo "</article>"; ?>
                <?php
                 }
                ?>