<?php require 'partials/head.php' ?>
	<div id="home-page">
		<div class="container mx-auto w-10/12 my-10 flex flex-col items-center">
				<h1 class="text-center uppercase font-bold text-3xl mb-10">Minhas Tarefas</h1>
				<div class="flex w-6/12 justify-between mb-10">
					<a href="/search?q=pending" class="bg-yellow-500 py-3 w-3/12 text-center uppercase text-white font-bold">Pendentes</a>
					<a href="/search?q=done" class="bg-green-500 py-3 w-3/12 text-center uppercase text-white font-bold">Feitas</a>
					<a href="/search?q=all" class="bg-blue-500 py-3 w-3/12 text-center uppercase text-white font-bold">Todas</a>
				</div>
				<table class="border border-collpase w-4/12 mb-20">
					<tbody class="border">
						<?php foreach ($tasks as $task) : ?>
							<tr class="border">
								<?php if ($task->completed) : ?>
									<td class="p-3 pl-5"><i class="far fa-check-square"></i></td>
									<td class="p-3">
										<strike>
											<a href="tasks/<?= $task->id; ?>"><?= $task->description; ?></a>
										</strike>
									</td>
								<?php else : ?>
									<td class="py-3 pl-5">
										<form action="complete_task" method="POST">
											<input type="hidden" name="id" value="<?= $task->id; ?>">
											<button type="submit"><i class="far fa-square"></i></button>
										</form>
									</td>
									<td class="py-3"><a href="tasks/<?= $task->id; ?>"><?= $task->description; ?></a></td>
								<?php endif; ?>
								<td class="p-3">
									<form action="delete_task" method="POST">
										<input type="hidden" name="id" value="<?= $task->id; ?>">
										<button type="submit"><i class="far fa-trash-alt"></i></button>
									</form>
								</td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>

				<h2 class="mb-5 uppercase text-2xl font-bold">Adicionar Tarefa</h2>
				<form action="tasks" method="POST" class="w-6/12">
					<label for="description">Descrição</label> <br>
					<input type="text" name="description" class="border p-2 mb-5 w-full"> <br>
					<input type="submit" value="Adicionar tarefa" class="bg-blue-600 p-2 w-full uppercase text-white cursor-pointer font-bold">
				</form>
		</div>
	</div>

<?php require 'partials/footer.php' ?>