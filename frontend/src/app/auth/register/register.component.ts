import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { MatFormFieldModule } from '@angular/material/form-field';
import { MatInputModule } from '@angular/material/input';
import { MatButtonModule } from '@angular/material/button';
import { User } from '../../entity/user';
import { AuthService } from '../../service/auth.service';
import { Router } from '@angular/router';


@Component({
  selector: 'app-register',
  standalone: true,
  imports: [
    CommonModule,
    FormsModule,
    MatFormFieldModule,
    MatInputModule,
    MatButtonModule
  ],
  templateUrl: './register.component.html',
  styleUrl: './register.component.scss'
})
export class RegisterComponent {
  user: User = {
    email: "",
    password: "",
    roles: ["ROLE_USER"]
  }
  constructor(public authService: AuthService, public router: Router) { }

  goLogin() { this.router.navigate(['/login']) }

  create(): void {
    this.authService.register(this.user).subscribe((r) => this.goLogin())
  }

  get valid(): boolean {
    return this.user !== undefined &&
      this.user.email !== "" &&
      this.user.password !== ""
  }

}