<html>
  <head>
    <title>CSV - Upload page</title>
  </head>
  <body>
    <h1>CSV page ...</h1>
    <?=Form::open(array('url' => 'csv/upload'))?>
    <?=Form::label('csv_file', 'Choose CSV file', array('class' => 'awesome'))?>
    <?=Form::file('csv_file')?>
    <?=Form::submit('Click Me!')?>
    <?=Form::close()?>
  </body>
</html>        