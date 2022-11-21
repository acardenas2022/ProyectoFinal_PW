

<style>
	
</style>

<table>
		<thead>
			<tr>
				<br>
				<br>
				<br>
				<th>
					<!-- Modal Trigger -->
					<a class="waves-effect amber darken-4 btn modal-trigger" href="#modal1">Cliente
						<i class="material-icons left " >add</i>
					</a>
					<!-- Modal Structure -->
					<div id="modal1" class="modal">
						<div class="modal-content">
							<nav>
								<div class="nav-wrapper amber darken-4">
									<a href="#" class="brand-logo center">Ingresar nuevo cliente</a>
								</div>
							</nav> 
							<br>
							<div class="row">
								<form class="col s12">
									<div class="row">
										<div class="input-field col s6">
											<input id="nombre" type="text" class="validate">
											<label for="nombre">Nombre</label>
										</div>
										<div class="input-field col s6">
											<input id="apellido" type="text" class="validate">
											<label for="apellido">Apellido</label>
										</div>
									</div>
									<div class="row">
										<div class="input-field col s6">
											<input id="documento" type="text" class="validate">
											<label for="documento">Documento</label>
										</div>
										<div class="input-field col s6">
											<input id="telefono" type="text" class="validate">
											<label for="telefono">Telefono</label>
										</div>
									</div>
									<button class="btn waves-effect waves-light right amber darken-4" type="submit" name="action">Guardar
   										<i class="material-icons right">save</i>
 									</button>
								</form>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="row">
							<form class="col s12">
								<div class="row">
									<div class="input-field col s6">
										<input id="nombreDestinatario" type="text" class="validate">
										<label for="nombreDestinatario">Nombre destinatario</label>
									</div>
									<div class="input-field col s6">
										<input id="ciudad" type="text" class="validate">
										<label for="ciudad">Ciudad</label>
									</div>
									<div class="input-field col s6">
										<input id="calle" type="password" class="validate">
										<label for="calle">Calle</label>
									</div>
									<div class="input-field col s6">
										<input id="numeroPuerta" type="text" class="validate">
										<label for="numeroPuerta">Numero de puerta</label>
									</div>
									<div class="input-field col s6">
										<input id="apartamento" type="password" class="validate">
										<label for="apartamento">Apartamento</label>
									</div>
									<div class="input-field col s6">
										<select>
      										<option value="" disabled selected>Estado</option>
      										<option value="1">Pendiente</option>
      										<option value="2">Reparto</option>
      										<option value="3">Entregado</option>
   										</select>
										
									</div>
									<div>
										<button class="btn waves-effect waves-light right amber darken-4" type="submit" name="action">Crear envio
											<i class="material-icons right">save</i>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</th>
			</tr>
		</thead>
		<tbody>
		
		</tbody>
</table>

