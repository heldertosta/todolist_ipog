import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable()
export class TarefaService {

  urlBase = 'http://localhost:8000/tasks'

  constructor(private http: HttpClient) { }

  listarTodas() {
    const url = `${this.urlBase}/listarTodas`
    return this.http.get<any>(url)
  }

  listarTodasPendentes() {
    const url = `${this.urlBase}/pendentes`
    return this.http.get<any>(url)
  }

  criar(titulo: string, descricao: string, prioridade: string) {
    const url = `${this.urlBase}/criar`
    const tarefa = {
      titulo: titulo,
      descricao: descricao,
      concluida: false,
      prioridade: prioridade
    }

    return this.http.post(url, tarefa)
  }

  editar(id: number, titulo: string, descricao: string, prioridade: string) {
    const url = `${this.urlBase}/editar`
    const tarefa = {
      id: id,
      titulo: titulo,
      descricao: descricao,
      concluida: false,
      prioridade: prioridade
    }

    return this.http.post(url, tarefa)
  }

  excluir(id: number) {
    const url = `${this.urlBase}/excluir/${id}`
    return this.http.delete(url)
  }

  marcar(tarefa: any) {
    const url = `${this.urlBase}/marcar`

    return this.http.post(url, tarefa)
  }
}
