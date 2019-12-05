<?php
    
    include('./config/db_connect.php');
    
    // write query for all pizzas
    $sql = 'SELECT title, ingredients, id FROM pizzas';

    // make query and get result
    $result = mysqli_query($conn, $sql);

    // fetch the resulting rows as an array
    $pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC); // MYSQLI_ASSOC means the way that we want the return (as an array)

    mysqli_free_result($result);// free result from memeory

    mysqli_close($conn); // close the connection to the db

?>
<!DOCTYPE html>
<html>

  <?php include('templates/header.php') ?>

  <h4 class="center grey-text">Pizzas!</h4>
  
  <div class="container">
    <div class="row">
    
        <?php foreach( $pizzas as $pizza ) : ?>

            <div class="col s6 md3">
                <div class="card z-depth-0">
                    <div class="card-content center">
                        <h6> <?php echo htmlspecialchars( $pizza['title'] ); ?> </h6>
                        <ul>
                            <?php foreach( explode(',', $pizza['ingredients']) as $ingredient ) : ?>
                                <li> <?php echo htmlspecialchars( $ingredient ); ?> </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <div class="card-action right-align">
                        <a href="details.php?id=<?php echo $pizza['id'] ?>" class="bran-text">more info</a>
                    </div>
                </div>
            </div>
        
        <?php endforeach ?>
    </div>
  </div>

  <?php include('templates/footer.php') ?>
  
</html>
