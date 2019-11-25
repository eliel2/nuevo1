{include file="header.tpl"}
{include file="navlogout.tpl"}

<div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="tabla" style="margin: 0 auto;">
            <table>
                <thead>
                    <tr>
                        <th>Pelicula</th>
                        <th>Sinopsis</th>
                    
                    </tr>
                </thead>
                <tbody>
                    <tr>                    
                        <td>{$pelicula->titulo}</td>
                        <td>{$pelicula->sinopsis}</td>             
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
            {include file="vue/comentarios.tpl"}

            <form id="FormComentarios" action="insertar" method="post">
                <input type="textarea" name="comentario" placeholder="comentario" size="20">
                <input type="text" name="descripcion" placeholder="Descripcion">
                <input type="number" name="puntaje"  max="10">
                <input type="checkbox" name="finalizada" id="finalizada">
                <input type="submit" value="Insertar">
            </form>

<script src="js/tareas.js"></script>
{include file="footer.tpl"}