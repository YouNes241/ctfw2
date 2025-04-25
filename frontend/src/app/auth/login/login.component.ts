import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { MatButtonModule } from '@angular/material/button';
import { CommonModule } from '@angular/common';
import { AuthService } from '../../service/auth.service';
import { Router } from '@angular/router';

@Component({
  selector: 'app-login',
  standalone: true,
  imports: [
    CommonModule,
    FormsModule,
    MatFormFieldModule,
    MatInputModule,
    MatButtonModule
  ],
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent {
  username = '';
  password = '';

  constructor(public auth: AuthService, public router: Router) { }

  get isValid(): boolean {
    return this.username !== '' && this.password !== '';
  }

  goAb() { this.router.navigate(['/about']) }

  login(): void {
    this.auth.resetError();
    this.auth.login(this.username, this.password);

  }

  hasError(): boolean {
    return this.auth.error
  }
}
