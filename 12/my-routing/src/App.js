import {
  Container, Jumbotron, Button,
  Navbar, Nav, Form, FormControl
} from 'react-bootstrap';

import {
  HashRouter as Router,
  Switch,
  Route,
  Link
} from "react-router-dom";


import Home from './Home'
import About from './About'
import Pricing from './Pricing'
import Register from './Register'


import 'bootstrap/dist/css/bootstrap.min.css'

function App() {
  return (
    <Router >
      <Container>
        <Navbar bg="dark" variant="dark">
          <Navbar.Brand href="/">
            <img
              src={`${process.env.PUBLIC_URL}/aaa.png`}
              width="30"
              height="30"
              className="d-inline-block align-top"
              alt="Pic"
            /> Library
          </Navbar.Brand>
          <Nav className="mr-auto">
            <Nav.Link href="/">Home</Nav.Link>
            <Nav.Link href="/about">About Us</Nav.Link>
            <Nav.Link href="/pricing">Pricing</Nav.Link>
          </Nav>
          <Form inline>
            <FormControl type="text" placeholder="Search" className="mr-sm-2" />
            <Button variant="outline-info">Search</Button>
          </Form>
        </Navbar>



        <Switch>
          <Route path="/register">
            <Register />
          </Route>

          <Route path="/about">
            <About />
          </Route>
          <Route path="/pricing">
            <Pricing />
          </Route>
          <Route path="/">
            <Home />
          </Route>
        </Switch>



      </Container>
    </Router>
  );
}

export default App;
