import { Component } from '@angular/core';
import { MatSnackBar } from '@angular/material/snack-bar';
import { ActivatedRoute, Router } from '@angular/router';
import { TarefaService } from 'src/app/services/tarefa.service';

@Component({
  selector: 'app-edicao-tarefa',
  templateUrl: './edicao-tarefa.component.html',
  styleUrls: ['./edicao-tarefa.component.scss']
})
export class EdicaoTarefaComponent {

  id = 0
  titulo = ''
  descricao = ''
  prioridade = ''

  constructor(
    private tarefaService: TarefaService,
    private router: Router,
    private route: ActivatedRoute,
    private snackBar: MatSnackBar
  ) {
    this.route.queryParams.subscribe((params) => {
      this.id = params['id']
      this.titulo = params['titulo']
      this.descricao = params['descricao']
      this.prioridade = params['prioridade']
    })
  }

  salvar() {
    if (this.id == 0) {
      this.tarefaService.criar(this.titulo, this.descricao, this.prioridade)
      .subscribe((retorno: any) => {
        this.snackBar.open(retorno.message, 'OK', {duration: 4000})
        this.router.navigate(['listar'])
      })
    } else {
      this.tarefaService.editar(this.id, this.titulo, this.descricao, this.prioridade)
      .subscribe((retorno: any) => {
        this.snackBar.open(retorno.message, 'OK', {duration: 4000})
        this.router.navigate(['listar'])
      })
    }
  }

}
