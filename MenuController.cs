using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;

public class MenuController : MonoBehaviour
{
    //to load scene level 1
    public void OnPlay()
    {
        SceneManager.LoadScene("Level1");
    }
    public void Awake()
    {
        //to show the cursor after first person Controller
        Cursor.visible = true;
        Cursor.lockState = CursorLockMode.None;
    }
}
