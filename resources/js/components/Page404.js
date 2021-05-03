import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'

class Page404 extends Component {
  constructor () {
    super()
    this.state = {
      condominiums: []
    }
  }

  componentDidMount () {
    axios.get('/api/condominiums').then(response => {
      this.setState({
        condominiums: response.data
      })
    });
    //axios.post('http:/localhost:8000/api/condominiums/', expense)
    //  .then(res => console.log(res.data));
  }

  render () {
    const { condominiums } = this.state
    return (
      <div className='container py-4'>
        <p>Pagina Não Encontrada</p>
      </div>
    )
  }
}

export default Page404