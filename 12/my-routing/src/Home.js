import { Link } from "react-router-dom";

import {
  Jumbotron, Button
} from 'react-bootstrap';

export default function Home() {
  return (
    <Jumbotron>
      <h1>Library App</h1>
      <p>
        This should be the landing page (home page).
  </p>
      <Link to="/register">
        <Button className="btn-secondary">Sign Up</Button>
      </Link>
    </Jumbotron>
  )
}
