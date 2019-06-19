<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </head>
  <body>
    <table  class="table table-striped table-hover" style="width:100%">
            <thead>
                <tr>
                    <th scope="col">Concurso</th>
                    <th scope="col">Postulante nombre</th>
                    <th scope="col">Postulante apellido</th>
                    <th scope="col">Fecha Presentacion</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Orden Merito</th>
                    <th scope="col">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                  @foreach ($AspirantesporConcurso as $AspirantesporConcurso)
                    <tr>
                      <td scope="row">{!! $AspirantesporConcurso->ref_gen !!}</td>
                      <td>{!! $AspirantesporConcurso->pos_nom !!}</td>
                      <td>{!! $AspirantesporConcurso->pos_ape !!}</td>
                      <td>{!! $AspirantesporConcurso->fec_pre !!}</td>
                      <td>{!! $AspirantesporConcurso->tip_pos !!}</td>
                      <td>{!! $AspirantesporConcurso->ord_mer !!}</td>
                      <td>{!! $AspirantesporConcurso->ord_mer !!}</td>
                    </tr>
                  @endforeach
            </tbody>
            <tfoot>
              <tr>
                  <th>Concurso</th>
                  <th>Postulante nombre</th>
                  <th>Postulante apellido</th>
                  <th>Fecha Presentacion</th>
                  <th>Tipo</th>
                  <th>Orden Merito</th>
                  <th>Cantidad</th>
              </tr>
            </tfoot>
        </table>
    </div>
  </body>
</html>
