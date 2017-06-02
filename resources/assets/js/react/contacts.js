
import React from 'react';
import ReactDom from 'react-dom';


/**
 *  Return the head of contact head
 */
 class ContactsHead extends React.Component{
 render(){
     return (
             <thead>
                 <tr>
                     <th>{contactLang.sn}</th>
                     <th>{contactLang.name}</th>
                     <th>{contactLang.email}</th>
                     <th>{contactLang.phone}</th>
                     <th>{contactLang.address}</th>
                     <th>{contactLang.company}</th>
                     <th>{contactLang.birth_date}</th>
                     <th>{contactLang.age}</th>
                     <th>{contactLang.action}</th>
                 </tr>

             </thead>
        );
     }
 }

/**
 * Return the row of contacts
 */
class ContactsRow extends React.Component{
 render(){
     let editUrl = app_url+"/contact/"+this.props.contact.id+"/edit";
     let deleteUrl = app_url+"/contact/"+this.props.contact.id+"/delete";
     let viewUrl = app_url+"/contact/"+this.props.contact.slug;
     return(
             <tr>
                 <td>{this.props.index+1}</td>
                 <td>{this.props.contact.name}</td>
                 <td>{this.props.contact.email}</td>
                 <td>{this.props.contact.phone}</td>
                 <td>{this.props.contact.address}</td>
                 <td>{this.props.contact.company}</td>
                 <td>{this.props.contact.birth_date}</td>
                 <td>{this.props.contact.age}</td>
                 <td>
                     <a href={editUrl}>{contactLang.edit}</a>
                     <a href={deleteUrl}>{contactLang.delete}</a>
                     <a href={viewUrl}>{contactLang.detail}</a>
                 </td>

             </tr>
            );
     }
 }

/**
 * Main contacts table
 */
 class ContactsTable extends React.Component{
    getRows(){
        var self=this;
        let rows=[];
        self.props.contacts.forEach(function(contact,key){

            contact.phone = contact.phone.toString();
            if (contact.name.toLowerCase().indexOf(self.props.filterText.toLowerCase())===-1 && contact.email.toLowerCase().indexOf(self.props.filterText.toLowerCase())===-1 && contact.phone.indexOf(parseInt(self.props.filterText))===-1 && contact.address.toLowerCase().indexOf(self.props.filterText.toLowerCase())===-1 && contact.company.toLowerCase().indexOf(self.props.filterText.toLowerCase())===-1)
            {
                return;
            }
            rows.push(<ContactsRow contact={contact} index={key}/>)
        });
        console.log(rows);
        return rows;
    }

    render(){


         return(
             <table className="table table-bordered">
                 <ContactsHead/>
                 <tbody>
                    {this.getRows()}
                 </tbody>
             </table>
         );
     }

 }


/**
 * Search bar
 */

class SearchBar extends React.Component{
    constructor(props){
        super(props);
        this.handleFilterTextInputChange = this.handleFilterTextInputChange.bind(this);
    }
    handleFilterTextInputChange(e){
        this.props.onFilterTextInput(e.target.value);
    }
    render(){
        return(
            <form>
                <input
                    type="text"
                    placeholder="Search..."
                    value={this.props.filterText}
                    onChange={this.handleFilterTextInputChange}
                />
            </form>
        );
    }
}


/**
 * Parent class for search bar and contacttable
 */

class ContactsList extends React.Component{
    constructor(props)
    {
       super(props);
        this.state={
            filterText:''
        };

        this.handleFilterTextInput = this.handleFilterTextInput.bind(this);
    }

    handleFilterTextInput(filterText){
        this.setState({
                filterText: filterText
        });
    }

    render(){
        return(
            <div>
                <SearchBar
                    filterText={this.state.filterText}
                    onFilterTextInput={this.handleFilterTextInput}
                />
                <ContactsTable contacts={this.props.contacts} filterText={this.state.filterText} />
            </div>
        );
    }
}


ReactDom.render(
    <ContactsList contacts={allContacts}/>,
    document.getElementById('contactslist')
);