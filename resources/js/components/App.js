import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './Header'
import NewProject from './NewProject'
import ProjectsList from './ProjectsList'
import CondominiumsList from './condominiums/Index'
import SingleCondominium from './condominiums/Show'
import NewCondominium from './condominiums/Create'
import EditCondominium from './condominiums/Edit'
import Page404 from './Page404'


class App extends Component {
    render () {
        return (
            <BrowserRouter basename="/">
                <div>
                    <Header />
                    <Switch>
                        <Route path='/condominiums' component={CondominiumsList} />
                        <Route path='/create-condominium' component={NewCondominium} />
                        <Route path='/edit-condominium/:id' component={EditCondominium} />
                        <Route path='/condominium/:id' component={SingleCondominium} />
                        <Route path='*' component={Page404} />
                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}

ReactDOM.render(<App />, document.getElementById('app'))