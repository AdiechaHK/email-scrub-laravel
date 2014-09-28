<html>
  <head>
    <title>API - Email</title>
  </head>
  <body>
    <h1>Email validation</h1>
    <p><?=var_dump($validate)?></p>
    <?=Form::open(array('url' => 'api/email'))?>
    <?=Form::label('email', 'Enter Email', array('class' => 'awesome'))?>
    <?=Form::email('email')?>
    <?=Form::submit('Check')?>
    <?=Form::close()?>
  </body>
</html>        