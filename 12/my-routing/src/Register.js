import { useState } from 'react'
import {
  Container, Row, Col, Button
} from 'react-bootstrap';
import { useForm } from "react-hook-form";

const provinceData = require('./provinces.json')

export default function Register() {
  const [amphurList, setAmphurList] = useState([])
  const { register, handleSubmit, watch, errors } = useForm();
  const onSubmit = (data) => {
    console.log(data)
  }

  console.log(provinceData[0])

  var provinceList = provinceData.map((v, i) => {
    return (
      <option value={v.id}>{v.name}</option>
    )
  })


  const loadAmphur = (provinceId) => {
    let amphurs = provinceData[provinceId - 1].amphur
    let list = amphurs.map((v, i) => {
      return (
        <option value={v.id}>{v.name}</option>
      )
    })
    return list
  }

  const handleProvinceSelected = (e) => {
    console.log(e.target.value)
    // console.log(e.target)
    setAmphurList(loadAmphur(e.target.value))
  }

  const handleAmphurSelected = (e) => {
    console.log(e.target.value)
  }

  loadAmphur(1)

  return (
    <form onSubmit={handleSubmit(onSubmit)}>
      <Container>
        <h1>Member Registration</h1>
        <Container>
          <Row>
            <Col>Name</Col>
            <Col><input type="text" name="name" ref={register} /></Col>
          </Row>
          <Row>
            <Col>Address</Col>
            <Col><input type="text" name="address" ref={register} /></Col>
          </Row>
          <Row>
            <Col>E-mail</Col>
            <Col><input type="email" name="email" ref={register} /></Col>
          </Row>
          <Row>
            <Col>Password</Col>
            <Col><input type="password" name="password" ref={register} /></Col>
          </Row>
          <Row>
            <Col>Confirmed Password</Col>
            <Col><input type="password" name="password2" ref={register} /></Col>
          </Row>

          <Row>
            <Col>Province</Col>
            <Col>
              <select name="province" onChange={handleProvinceSelected} ref={register}>
                {provinceList}
              </select>
            </Col>
          </Row>


          <Row>
            <Col>Amphur</Col>
            <Col>
              <select name="amphur" onChange={handleAmphurSelected} ref={register}>
                {amphurList}
              </select>
            </Col>
          </Row>

          <Button variant="outline-dark" type="submit">Register</Button>

        </Container>
      </Container>
    </form>
  )
}
