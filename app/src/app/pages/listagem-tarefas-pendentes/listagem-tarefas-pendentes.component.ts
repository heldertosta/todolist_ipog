import { Component } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';
import { Router } from '@angular/router';
import { TarefaService } from 'src/app/services/tarefa.service';

@Component({
  selector: 'app-listagem-tarefas-pendentes',
  templateUrl: './listagem-tarefas-pendentes.component.html',
  styleUrls: ['./listagem-tarefas-pendentes.component.scss']
})
export class ListagemTarefasPendentesComponent {

  tarefas: any[] = []

  constructor(
    private tarefaService: TarefaService,
    private router: Router,
    private snackBar: MatSnackBar
  ) {
    this.listarTodasPendentes()
  }

  listarTodasPendentes() {
    setTimeout(() => {
      this.tarefaService.listarTodasPendentes()
      .subscribe((retorno: any) => {
        this.tarefas = retorno
      })
    }, 200);
  }

  marcar(tarefa: any) {
    this.tarefaService.marcar(tarefa)
    .subscribe((retorno: any) => {
      this.snackBar.open(retorno.message, 'OK', {duration: 4000})
    })
  }

  editar(id: number, titulo: string, descricao: string, prioridade: string) {
    this.router.navigate(['editar'], {queryParams: {id: id, titulo: titulo, descricao: descricao, prioridade: prioridade}})
  }

  excluir(id: number) {
    this.tarefaService.excluir(id)
    .subscribe((retorno: any) => {
      this.snackBar.open(retorno.message, 'OK', {duration: 4000})
      this.listarTodasPendentes()
    })
  }

  adicionar() {
    this.router.navigate(['editar'], {queryParams: {id: 0, titulo: '', descricao: '', prioridade: ''}})
  }

  mostrarTodas() {
    this.router.navigate(['listar'])
  }

}
