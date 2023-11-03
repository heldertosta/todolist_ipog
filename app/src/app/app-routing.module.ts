import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { ListagemTarefasComponent } from './pages/listagem-tarefas/listagem-tarefas.component';
import { EdicaoTarefaComponent } from './pages/edicao-tarefa/edicao-tarefa.component';
import { ListagemTarefasPendentesComponent } from './pages/listagem-tarefas-pendentes/listagem-tarefas-pendentes.component';

const routes: Routes = [
  { path: '', redirectTo: '/listar', pathMatch: 'full' },
  { path: 'listar', component: ListagemTarefasComponent },
  { path: 'listar-pendentes', component: ListagemTarefasPendentesComponent },
  { path: 'editar', component: EdicaoTarefaComponent },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
