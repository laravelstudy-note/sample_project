//import React from 'react';
import React, { useState } from 'react';
import ReactDOM from 'react-dom';

import Alert from "./Alert";


function Example() {
	
	const [visibled, setVisibled] = useState(0)

	const alertRender = (isVisible, callback) => {
		if(isVisible){
			return <Alert 
				message="Exampleから渡す" 
				type="success"
				onClose={ () => callback(0) }
			/>
		}
		
	}
	
    return (
        <div className="container">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card">
                        <div className="card-header">これはReactのコンポーネントです</div>

                        <div className="card-body">
							
							{ alertRender(visibled, setVisibled) }
							
							本文を書き換えます

							<button 
								className="btn btn-primary" 
								onClick={() => setVisibled(1) }>Alertを表示</button>
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
