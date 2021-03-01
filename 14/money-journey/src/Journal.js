import { useState, useEffect } from 'react'
import Container from 'react-bootstrap/Container'
import Table from 'react-bootstrap/Table'
import Row from 'react-bootstrap/Row'
import Col from 'react-bootstrap/Col'
import Select from 'react-select'

// Firebase
import { useCollectionData } from 'react-firebase-hooks/firestore';
import firebase from 'firebase/app'
import 'firebase/firestore'
import 'firebase/auth'

if (firebase.apps.length === 0) {
  firebase.initializeApp({
    apiKey: process.env.apiKey,
    authDomain: process.env.authDomain,
    // databaseUrl: process.env.REACT_APP_DATABASE_URL,
    projectId: process.env.projectId,
    storageBucket: process.env.storageBucket,
    messagingSenderId: process.env. messagingSenderId,
    appId: process.env.appId
  })
}
const firestore = firebase.firestore()
const auth = firebase.auth()


// const data = require('./sampleData.json')

const categories = [
  { id: 0, name: '-- All --' },
  { id: 1, name: 'Food' },
  { id: 2, name: 'Fun' },
  { id: 3, name: 'Transportation' },
]

export default function Journal() {
  const [records, setRecords] = useState([])
  const [total, setTotal] = useState(0)

  // Firebase stuff
  const moneyRef = firestore.collection('money');
  const query = moneyRef.orderBy('createdAt', 'asc').limitToLast(100);
  const [data] = useCollectionData(query, { idField: 'id' });


  console.log("REACT_APP_PROJECT_ID", process.env.REACT_APP_PROJECT_ID)

  // This will be run when 'data' is changed.
  useEffect(() => {
    if (data) { // Guard condition
      let t = 0
      let r = data.map((d, i) => {
        console.log('useEffect',d)
        t += d.amount
        return (
          <tr>
            <td>{i + 1}</td>
            <td>{d.createdAt.seconds}</td>
            <td>{d.description}</td>
            <td>{d.category.name}</td>
            <td>{d.amount}</td>
          </tr>
        )
      })

      setRecords(r)
      setTotal(t)
    }
  },
    [data])


  const handleCategoryFilterChange = (obj) => {
    console.log('filter', obj)
    if (data) { // Guard condition      
      let t = 0
      let filteredData = data.filter(d => obj.id == 0 || d.category.id == obj.id)
      let r = filteredData.map((d, i) => {
        console.log('filter',d)
        t += d.amount
        return (
          <tr>
            <td>{i + 1}</td>
            {/* <td>{d.createdAt.toDate()}</td> */}
            <td>---</td>
            <td>{d.description}</td>
            <td>{d.category.name}</td>
            <td>{d.amount}</td>
          </tr>
        )
      })

      setRecords(r)
      setTotal(t)
    }
  }



  return (
    <Container>
      <Row>
        <Col>
          <h1>Journal</h1>
        </Col>
        <Col>
          Category:
          <Select
            options={categories}
            getOptionLabel={x => x.name}
            getOptionValue={x => x.id}
            onChange={handleCategoryFilterChange}
          />
        </Col>

      </Row>

      <Table striped bordered hover variant="dark">
        <thead>
          <tr>
            <th>#</th>
            <th>Date/Time</th>
            <th>Description</th>
            <th>Category</th>
            <th>Amount</th>
          </tr>
        </thead>
        <tbody>
          {records}
        </tbody>
        <tfoot>
          <td colSpan={5}>
            <h2>Total: {total}</h2>
          </td>
        </tfoot>
      </Table>
    </Container>
  )
}