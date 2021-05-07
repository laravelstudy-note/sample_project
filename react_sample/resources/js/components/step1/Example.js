//import React from 'react';
import React from 'react';
import ReactDOM from 'react-dom';

function Example() {

	const text = "Hello React";

	const title_list = ["あいうえお", "かきくけこ", "さしすせそ"];

	let title_component_list = []
	for(var i=0; i<title_list.length; i++){
		const title = title_list[i];
		title_component_list.push(<li>(2){title}</li>);
	}
	
	const renderTitleList = (title_list) => {
		let component_list = [];

		for(var i=0; i<title_list.length; i++){
			const title = title_list[i];
			component_list.push(<li>(3){title}</li>);
		}

		return <>{ component_list }</>
	}

    return (
        <div className="container mt-3">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">{ text }</div>

                        <div className="card-body">
							
							mapを使うやりかた

							<ul>
								{
									title_list.map((title, index) => {
										return <li key={index}>
											(1) { title }
										</li>		
									})
								}
							</ul>


							title_component_list

							<ul>
								{ title_component_list }
							</ul>

							renderTitleList

							<ul>
								{ renderTitleList(title_list) }
							</ul>

						</div>
                    </div>
                </div>
            </div>
        </div>

    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
