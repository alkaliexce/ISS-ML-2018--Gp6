function generateModel() {
    model = tf.sequential();
    model.add(tf.layers.dense({units: 61, inputShape: 61, activation: 'relu'}));
    model.add(tf.layers.dense({units: 1000, activation: 'relu'}));
    model.add(tf.layers.dense({units: 100, activation: 'relu'}));
    model.add(tf.layers.dense({units: 60, activation: 'relu'}));
    model.add(tf.layers.dense({units: 1}));
    model.compile({optimizer: 'adam', loss: 'meanSquaredError'});
    return model
}

async function trainModel(X, Y, iterations) {
    updateProcess("10" , "10% ----- Start training data!" );
    tf.setBackend('webgl');
    // How many examples the model should "see" before making a parameter update.
    model = generateModel();

for(i=0;i<iterations;i++){
    X_tmp=X.slice();
    Y_tmp=Y.slice();
	updateProcess((10 + (80/iterations )* i ).toString() , (10 + (80/iterations ) * i).toString()+"% ----- Start of iteration #" + (i+1).toString());
	addProcessMessage("<p>Loss(RMSE):</p>");
    while (true) {
        X_batch = X_tmp.splice(0, 10000);
        Y_batch = Y_tmp.splice(0, 10000);
        if (X_batch.length == 0) {
            break;
        }
        Xs = tf.tensor(X_batch);
        Ys = tf.tensor(Y_batch);
        //console.log(Xs.print(true));
        //console.log(Ys.print(true));
        const h = await model.fit(x = Xs, y = Ys, {batchsize: 32,  verbose: 2, shuffle: true});
		addProcessMessage("<p>"+parseInt(Math.sqrt(h.history.loss[0]))+"</p>");
    }
	updateProcess((10 + (80/iterations ) * (i+1)).toString() , (10 + (80/iterations ) * (i+1))+"% ----- End of iteration #" + (i+1).toString() );
}
	updateProcess("90" , "90% ----- Saving Data to server... Please do not close window...  " );
    await model.save("http://localhost:83/updateModel.php");
	updateProcess("100" , "100% ----- Trained model saved!   " );
}

async function addRow(X, Y, iterations) {
    const model = await tf.loadModel('/model/model.json');
    sum=0;
    n=0;
    model.compile({optimizer: 'adam', loss: 'meanSquaredError'});
    tf.setBackend('webgl');
    
        Xs=tf.tensor(X);
        Ys=tf.tensor(Y);
    for(i=0;i<iterations;i++){
        
    console.log(Xs.print(true));
    console.log(Ys.print(true));
    const h = await model.fit(x = Xs, y = Ys, {batchsize: 32,  verbose: 2, shuffle: true});
    
    sum=sum+parseInt(h.history.loss[0]);
    n=n+1
    }

    await model.save("http://localhost:83/updateModel.php");
    return parseInt(Math.sqrt(sum/n));
}


async function predict(inputArray) {
    const model = await tf.loadModel('/model/model.json');
    //const model = await tf.loadFrozenModel('/model/model.json','/model/model.weights.bin');
    inputTensor = tf.tensor([inputArray]);
    predictedTensor = model.predict(inputTensor);
    return parseInt(Array.from(predictedTensor.dataSync()));
    //alert(model.getWeights());
}