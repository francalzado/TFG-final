<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="js.js"></script>
<link rel="stylesheet" type="text/css" href="/css/flashcard.css.css" media="screen" />

<?php foreach ($todos as $flashcard) { ?>


<div class="container-fluid bg-info">
    <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3><span class="label label-warning"  id="qid"><?php echo 'Tema '.$_GET['id_tema']?></span> <?php echo $flashcard['pregunta']; ?></h3>
        </div>
          <div class="text-center">
        <?php echo $flashcard['cuerpo']; ?>          </div>
        <div class="modal-body">
            <div class="col-xs-3 col-xs-offset-5">
               <div id="loadbar" style="display: none;">
                  <div class="blockG" id="rotateG_01"></div>
                  <div class="blockG" id="rotateG_02"></div>
                  <div class="blockG" id="rotateG_03"></div>
                  <div class="blockG" id="rotateG_04"></div>
                  <div class="blockG" id="rotateG_05"></div>
                  <div class="blockG" id="rotateG_06"></div>
                  <div class="blockG" id="rotateG_07"></div>
                  <div class="blockG" id="rotateG_08"></div>
              </div>
          </div>

          <div class="quiz" id="quiz" data-toggle="buttons">
           <label class="element-animation1 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="1"><?php echo $flashcard['r1']; ?></label>
           <label class="element-animation2 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="2"><?php echo $flashcard['r2']; ?></label>
           <label class="element-animation3 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="3"><?php echo $flashcard['r3']; ?></label>
           <label class="element-animation4 btn btn-lg btn-primary btn-block"><span class="btn-label"><i class="glyphicon glyphicon-chevron-right"></i></span> <input type="radio" name="q_answer" value="4"><?php echo $flashcard['r4']; ?></label>
       </div>
   </div>
<!--   <div class="modal-footer text-muted">
    <span id="answer"></span>
</div>-->
</div>
</div>
</div>


<div class="container-fluid bg-info" align="center" style="background-color: #bd2130">
    
    <span id="answer"></span>
</div>


            <?php } ?>