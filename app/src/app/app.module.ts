import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { ListagemTarefasComponent } from './pages/listagem-tarefas/listagem-tarefas.component';
import { EdicaoTarefaComponent } from './pages/edicao-tarefa/edicao-tarefa.component';
import { MatRadioModule} from '@angular/material/radio';
import { FormsModule } from '@angular/forms';
import { MatCheckboxModule } from '@angular/material/checkbox';
import { MatCardModule } from '@angular/material/card';
import { MatIconModule } from '@angular/material/icon';
import { MatDividerModule } from '@angular/material/divider';
import { MatButtonModule } from '@angular/material/button';
import { TarefaService } from './services/tarefa.service';
import { HttpClientModule } from '@angular/common/http';
import { MatInputModule } from '@angular/material/input';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatProgressSpinnerModule } from '@angular/material/progress-spinner';
import { MatSnackBarModule } from '@angular/material/snack-bar';
import { ListagemTarefasPendentesComponent } from './pages/listagem-tarefas-pendentes/listagem-tarefas-pendentes.component';

@NgModule({
  declarations: [
    AppComponent,
    ListagemTarefasComponent,
    EdicaoTarefaComponent,
    ListagemTarefasPendentesComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    BrowserAnimationsModule,
    MatCheckboxModule,
    MatRadioModule,
    FormsModule,
    MatCardModule,
    MatIconModule,
    MatDividerModule,
    MatButtonModule,
    HttpClientModule,
    MatInputModule,
    MatFormFieldModule,
    MatProgressSpinnerModule,
    MatSnackBarModule
  ],
  providers: [
    TarefaService
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
